# Changelog

## [0.5.1](https://github.com/rmaud-me/bebou-app/compare/0.5.0...0.5.1) (2026-01-01)


### Bug Fixes

* **doctrine:** Remove doctrine "proxy_dir" config ([#60](https://github.com/rmaud-me/bebou-app/issues/60)) ([a30a016](https://github.com/rmaud-me/bebou-app/commit/a30a0161bb708c2fa4e118f73803fc84bfe4cf6e))

## [0.5.0](https://github.com/rmaud-me/bebou-app/compare/0.4.2...0.5.0) (2026-01-01)


### Features

* **release please:** Remove v in tag ([#58](https://github.com/rmaud-me/bebou-app/issues/58)) ([4d6d611](https://github.com/rmaud-me/bebou-app/commit/4d6d611c7f08c62f7344df22a3d952ca31b9269d))


### Bug Fixes

* **gin-ranking:** Fix resize image algo + fix form error ([#59](https://github.com/rmaud-me/bebou-app/issues/59)) ([42bd829](https://github.com/rmaud-me/bebou-app/commit/42bd82906e6040092d3e9c87f55eacb63497b5d5))


### Miscellaneous Chores

* **composer:** bump the composer-version group across 1 directory with 33 updates ([#54](https://github.com/rmaud-me/bebou-app/issues/54)) ([9837c9f](https://github.com/rmaud-me/bebou-app/commit/9837c9f2b1523063ce09ae936bccfd40dd65f433))
* **docker:** bump php from 8.4-fpm to 8.5-fpm in the docker-version group ([#51](https://github.com/rmaud-me/bebou-app/issues/51)) ([987ebac](https://github.com/rmaud-me/bebou-app/commit/987ebace9ce1527604101d45ae495c40e353099f))

## [0.4.2](https://github.com/rmaud-me/bebou-app/compare/v0.4.1...v0.4.2) (2025-12-14)


### Bug Fixes

* **cd:** Add step to remove v from tag when redeploy manually a prod tag ([da0c82e](https://github.com/rmaud-me/bebou-app/commit/da0c82e857a9732a1a59c451b3f992d5647b45c9))
* **gin:** Add edit button + fix edit page iamge display ([7ba3b99](https://github.com/rmaud-me/bebou-app/commit/7ba3b9974d7ca1932c557e5cc47afbd56548df5d))

## [0.4.1](https://github.com/rmaud-me/bebou-app/compare/v0.4.0...v0.4.1) (2025-12-14)


### Bug Fixes

* **cd:** Add possibility to deploy manually prod tag ([af90d67](https://github.com/rmaud-me/bebou-app/commit/af90d67d4a121427f1b2e3099bd110e7fe7f49ac))

## [0.4.0](https://github.com/rmaud-me/bebou-app/compare/v0.3.7...v0.4.0) (2025-12-14)


### Features

* **CD:** Detect if it is dev tag to update correctly traefik config ([4f5e98c](https://github.com/rmaud-me/bebou-app/commit/4f5e98cade36dffeb145601ca3c44125461bc3ea))
* **s3:** [#27](https://github.com/rmaud-me/bebou-app/issues/27) - Add scaleway as s3 provider ([#53](https://github.com/rmaud-me/bebou-app/issues/53)) ([9b594a2](https://github.com/rmaud-me/bebou-app/commit/9b594a2ca39f96054c91c32648122193dc208f40))


### Bug Fixes

* **CD:** Add 30 sec after healthy for php container to be sure php is up for the nginx rollout ([15c4cba](https://github.com/rmaud-me/bebou-app/commit/15c4cba9f0bd971836193b917dc5ab9ce21f3b14))
* **CD:** Add URL_TAG as env for deploy gha ([8a5526c](https://github.com/rmaud-me/bebou-app/commit/8a5526c5b0a995a64f43887073971f6019aa15af))
* **login:** Disable csrf stateless config to avoid csrf invalid error ([#49](https://github.com/rmaud-me/bebou-app/issues/49)) ([d840f19](https://github.com/rmaud-me/bebou-app/commit/d840f19cd6f60930618e283e5fd7c0eb05a6c77c))
* **login:** Disable turbo for login page ([82dac22](https://github.com/rmaud-me/bebou-app/commit/82dac22d94b033296a607d113ca95239278f3710))


### Miscellaneous Chores

* **composer:** bump the composer-version group with 30 updates ([#47](https://github.com/rmaud-me/bebou-app/issues/47)) ([b4cd72a](https://github.com/rmaud-me/bebou-app/commit/b4cd72a4288f06cfc163bd339955c0d595001129))

## [0.3.7](https://github.com/rmaud-me/bebou-app/compare/v0.3.6...v0.3.7) (2025-10-18)


### Bug Fixes

* **login:** Add log for login route ([e376731](https://github.com/rmaud-me/bebou-app/commit/e3767310eb234fd05c97768f455c7d34106bd762))

## [0.3.6](https://github.com/rmaud-me/bebou-app/compare/v0.3.5...v0.3.6) (2025-10-18)


### Bug Fixes

* **docker:** Remove VOLUME for prod image ([04da598](https://github.com/rmaud-me/bebou-app/commit/04da5987fccb1c9384353a7b85abcf60cf2a28af))

## [0.3.5](https://github.com/rmaud-me/bebou-app/compare/v0.3.4...v0.3.5) (2025-10-18)


### Bug Fixes

* **CD:** Seperate rollout command ([c48e90e](https://github.com/rmaud-me/bebou-app/commit/c48e90e061e750b05101103a657a0137bae1ebae))

## [0.3.4](https://github.com/rmaud-me/bebou-app/compare/v0.3.3...v0.3.4) (2025-10-18)


### Bug Fixes

* **docker:** Add rights command on sqlite folder ([#42](https://github.com/rmaud-me/bebou-app/issues/42)) ([c0c1d48](https://github.com/rmaud-me/bebou-app/commit/c0c1d485a39f922bae7d4324700137003019ce9b))

## [0.3.3](https://github.com/rmaud-me/bebou-app/compare/v0.3.2...v0.3.3) (2025-10-18)


### Bug Fixes

* **docker:** Add logs to check php container issue ([#41](https://github.com/rmaud-me/bebou-app/issues/41)) ([3baeefd](https://github.com/rmaud-me/bebou-app/commit/3baeefd0b35c08b8887b927b13d61237d51017ab))
* **docker:** Uncomment migration part in docker entrypoint ([00ebd1b](https://github.com/rmaud-me/bebou-app/commit/00ebd1be1527f55e8c13524d4738fea1ae9f33cf))

## [0.3.2](https://github.com/rmaud-me/bebou-app/compare/v0.3.1...v0.3.2) (2025-10-18)


### Bug Fixes

* **CD:** Fix compose.yaml url in deployment step ([0b08d0f](https://github.com/rmaud-me/bebou-app/commit/0b08d0f844051ebcbf37c07bf6c09c15a4fe13d5))

## [0.3.1](https://github.com/rmaud-me/bebou-app/compare/v0.3.0...v0.3.1) (2025-10-18)


### Bug Fixes

* **infra:** Fix command to deploy + download config infra during deploy ([#37](https://github.com/rmaud-me/bebou-app/issues/37)) ([42e85c7](https://github.com/rmaud-me/bebou-app/commit/42e85c71800aca46ebb884a58ef416fc58cd7c1e))

## [0.3.0](https://github.com/rmaud-me/bebou-app/compare/v0.2.1...v0.3.0) (2025-10-10)


### Features

* Gestion des gins ([#26](https://github.com/rmaud-me/bebou-app/issues/26)) ([341ef4b](https://github.com/rmaud-me/bebou-app/commit/341ef4b60535a37ec1a3e7a4c1bc2b9f198bb00c))
* **mailer:** [#24](https://github.com/rmaud-me/bebou-app/issues/24) - Ajout de symfony mailer avec un mailcatcher + scaleway ([#30](https://github.com/rmaud-me/bebou-app/issues/30)) ([8911d07](https://github.com/rmaud-me/bebou-app/commit/8911d0799cbf4b64d86b9232bc7774d3ba8114a9))
* **security:** Add login, registration system to protect some page ([#25](https://github.com/rmaud-me/bebou-app/issues/25)) ([bf8d6bd](https://github.com/rmaud-me/bebou-app/commit/bf8d6bd826cedf54a6b8264d88007b42b9cfe6ee))
* **security:** Protect page behind ROLE_GIN ([#36](https://github.com/rmaud-me/bebou-app/issues/36)) ([12b9f4e](https://github.com/rmaud-me/bebou-app/commit/12b9f4e774cabbb1c6f3a47b5641863314dadb48))


### Miscellaneous Chores

* **composer:** bump the composer-version group with 23 updates ([#34](https://github.com/rmaud-me/bebou-app/issues/34)) ([faa3555](https://github.com/rmaud-me/bebou-app/commit/faa3555d0e4426d63d09d3ec139f8caaa7ad916a))

## [0.2.1](https://github.com/rmaud-me/bebou-app/compare/v0.2.0...v0.2.1) (2025-09-10)


### Bug Fixes

* **release-please:** Fix name of input pass to deploy workflow ([#21](https://github.com/rmaud-me/bebou-app/issues/21)) ([bb06566](https://github.com/rmaud-me/bebou-app/commit/bb065661c10baf0726e3b706b08414099e86e71b))
* **release-please:** Fix permission for github deploy workflow ([#22](https://github.com/rmaud-me/bebou-app/issues/22)) ([f553f12](https://github.com/rmaud-me/bebou-app/commit/f553f12e6280c91d0b6a10a3c297b09067e2fd31))

## [0.2.0](https://github.com/rmaud-me/bebou-app/compare/v0.1.0...v0.2.0) (2025-09-04)


### Features

* Deploy on server with docker compose ([#12](https://github.com/rmaud-me/bebou-app/issues/12)) ([7374c22](https://github.com/rmaud-me/bebou-app/commit/7374c22a196b348def20ef29010f4758539816ae))
* Import dmc finder ([#3](https://github.com/rmaud-me/bebou-app/issues/3)) ([2307db6](https://github.com/rmaud-me/bebou-app/commit/2307db606e6745c2c78676839a61b0279324eb38))


### Bug Fixes

* **release-please:** Remove bump-patch-for-minor-pre-major config ([affc8bc](https://github.com/rmaud-me/bebou-app/commit/affc8bc6b5e44f51cf8fda429f9f77a4eb012732))


### Miscellaneous Chores

* **composer:** bump doctrine/doctrine-bundle from 2.15.0 to 2.15.1 ([#9](https://github.com/rmaud-me/bebou-app/issues/9)) ([ab37f03](https://github.com/rmaud-me/bebou-app/commit/ab37f030c979823c3cd0ba3635fdfc1424f5ca22))
* **composer:** bump symfony/expression-language from 7.3.0 to 7.3.2 ([#8](https://github.com/rmaud-me/bebou-app/issues/8)) ([6f45073](https://github.com/rmaud-me/bebou-app/commit/6f45073e56c974c701e83c54caa4aa393919c796))
* **composer:** bump symfony/framework-bundle from 7.3.2 to 7.3.3 ([#15](https://github.com/rmaud-me/bebou-app/issues/15)) ([69f6b80](https://github.com/rmaud-me/bebou-app/commit/69f6b80f4ce0bb637402febb5df08a7c9d4ef7e2))
* **composer:** bump symfony/http-client from 7.3.1 to 7.3.3 ([#14](https://github.com/rmaud-me/bebou-app/issues/14)) ([fd40060](https://github.com/rmaud-me/bebou-app/commit/fd4006047f04a94780b4915f1bf23e755723b83b))
* **composer:** bump symfony/intl from 7.3.1 to 7.3.2 ([#7](https://github.com/rmaud-me/bebou-app/issues/7)) ([3aaf80d](https://github.com/rmaud-me/bebou-app/commit/3aaf80dcd309f62552450b1dcffbeee3ade4291b))
* **composer:** bump symfony/translation from 7.3.1 to 7.3.2 ([#10](https://github.com/rmaud-me/bebou-app/issues/10)) ([14defb4](https://github.com/rmaud-me/bebou-app/commit/14defb407f2a5c0c00552f3aa5f6365d387ee05b))
* **composer:** bump symfony/translation from 7.3.2 to 7.3.3 ([#13](https://github.com/rmaud-me/bebou-app/issues/13)) ([af3a896](https://github.com/rmaud-me/bebou-app/commit/af3a896797164ece9270f59828169a0ebd04d097))
* **composer:** bump the composer-version group with 7 updates ([#17](https://github.com/rmaud-me/bebou-app/issues/17)) ([11c84ef](https://github.com/rmaud-me/bebou-app/commit/11c84efb1381a3ed39bbdf7546d2a201438f9c58))
* **composer:** bump the composer-version group with 8 updates ([#6](https://github.com/rmaud-me/bebou-app/issues/6)) ([f616238](https://github.com/rmaud-me/bebou-app/commit/f61623830460f27626d47393a9a371c88a3192c6))

## 0.1.0 (2025-07-25)


### Features

* Add github actions on the project ([1541a1f](https://github.com/rmaud-me/bebou-app/commit/1541a1fad9dd86faba3d687389476d58d0597dea))


### Bug Fixes

* **release-please:** Change secret name for token ([76b335c](https://github.com/rmaud-me/bebou-app/commit/76b335c142fc4d16f0b82dfdc3f7442897ef9acb))
* **release-please:** Remove next-step ([b04d596](https://github.com/rmaud-me/bebou-app/commit/b04d59601baa24808f238adcd50b5e80476279be))
* Remove id-token permission for release please gha ([97d0e30](https://github.com/rmaud-me/bebou-app/commit/97d0e302b438acf7c72c11d2122eb0d82d19f41c))


### Miscellaneous Chores

* Init bebou project :tada: ([2d904f4](https://github.com/rmaud-me/bebou-app/commit/2d904f42ca53f68abbced8eee58897c70d7f8d3f))
