FROM dunglas/frankenphp:1-php8.4 AS frankenphp_upstream

FROM frankenphp_upstream AS bebou_php_base

WORKDIR /srv

VOLUME /srv/var/

# Update package list and install system dependencies
# libcap2-bin Needed for rootless
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
	acl \
	git \
	file \
	gettext \
	libcap2-bin \
    && rm -rf /var/lib/apt/lists/* \
	;

RUN set -eux; \
    install-php-extensions @composer zip intl apcu opcache \
    ;

ENV PHP_INI_SCAN_DIR=":$PHP_INI_DIR/app.conf.d"

COPY --link .docker/frankenphp/conf.d/10-app.ini $PHP_INI_DIR/app.conf.d/
COPY --link --chmod=755 .docker/frankenphp/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
COPY --link .docker/frankenphp/Caddyfile /etc/frankenphp/Caddyfile

ENTRYPOINT ["docker-entrypoint"]

HEALTHCHECK --start-period=60s CMD curl -f http://localhost:2019/metrics || exit 1
CMD [ "frankenphp", "run", "--config", "/etc/frankenphp/Caddyfile" ]

FROM bebou_php_base AS bebou_php_dev

ARG USER=appuser

COPY --link .docker/frankenphp/conf.d/20-app.dev.ini $PHP_INI_DIR/app.conf.d/

# Fix the xdebug version because, I have SIGSEGV with the 3.4.3
RUN set -eux; \
	install-php-extensions xdebug \
    ;

RUN \
    adduser --disabled-password --gecos "" ${USER}; \
    chown -R ${USER} /srv; \
    # CAP_FOWNER+ep /usr/bin/setfacl instruction authorize appuser to use setfacl
    setcap CAP_FOWNER+ep /usr/bin/setfacl; \
    # Add additional capability to bind to port 80 and 443
    setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp; \
    # Give write access to /data/caddy and /config/caddy
    chown -R ${USER}:${USER} /data/caddy && chown -R ${USER}:${USER} /config/caddy;

USER ${USER}

CMD [ "frankenphp", "run", "--config", "/etc/frankenphp/Caddyfile", "--watch" ]

FROM bebou_php_base AS bebou_php_prod

ENV APP_ENV=prod

ARG USER=appuser

RUN \
    adduser --disabled-password --gecos "" ${USER}; \
    chown -R ${USER} /srv; \
    # CAP_FOWNER+ep /usr/bin/setfacl instruction authorize appuser to use setfacl
    setcap CAP_FOWNER+ep /usr/bin/setfacl; \
    # Add additional capability to bind to port 80 and 443
    setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp; \
    # Give write access to /data/caddy and /config/caddy
    chown -R ${USER}:${USER} /data/caddy && chown -R ${USER}:${USER} /config/caddy;

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY --link .docker/frankenphp/conf.d/20-app.prod.ini $PHP_INI_DIR/app.conf.d/

# prevent the reinstallation of vendors at every changes in the source code
COPY --link ./composer.* ./symfony.* ./

RUN set -eux; \
    composer install --no-cache --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress

# copy sources
COPY --link . ./
RUN rm -Rf frankenphp/

RUN set -eux; \
	mkdir -p var/cache var/log; \
	composer dump-autoload --classmap-authoritative --no-dev; \
	composer dump-env prod; \
	composer run-script --no-dev post-install-cmd; \
	chmod +x bin/console; sync;

###> Build assets ###
RUN set -eux; \
    bin/console importmap:install; \
    bin/console asset-map:compile;
###< Build assets ###

USER ${USER}
