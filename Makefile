DC = docker compose
UID = $(shell id -u)

## INSTALL 📜
install: ## Install from scratch the project
	cp -n .env .env.local && cp -n docker.env docker.env.local && cp -n .docker/data/history.dist .docker/data/history
	mkdir -p ./sqlite

	$(DC) up -d --build --wait

	$(DC) exec php composer install

	$(MAKE) --no-print-directory install-assets

reset: ## Remove docker volume, files and folders generate by the projet
	$(DC) down --remove-orphans -v --rmi all
	rm -f ./.env.local -f ./docker.env.local -f .docker/data/history
	sudo rm -rf ./var ./vendor

reinstall: reset install ## Reinstall from scratch the project

## ASSETS 💅
install-assets: ## Install assets via docker
	$(DC) exec php bash -c "rm -rf ./assets/vendor && bin/console importmap:install"

reset-assets: install-assets build-assets ## Reset all assets via docker

## QUALITY ✨
cs-fixer: ## Fix cs on the project
    # Need PHP_CS_FIXER_IGNORE_ENV because php cs fixer is not fully compatible with php 8.4
	$(DC) exec php bash -c "PHP_CS_FIXER_IGNORE_ENV=1 ./vendor/bin/php-cs-fixer fix --verbose"
	$(DC) exec php ./vendor/bin/twig-cs-fixer --fix

phpstan: ## Run phpstan
	$(DC) exec php ./vendor/bin/phpstan analyse

## UTILS
php: ## Go to php container
	$(DC) exec php bash

## HELP 🆘
help: ## Show the help
	@grep -E '(^[0-9a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.DEFAULT_GOAL := help

.PHONY : tests clean
