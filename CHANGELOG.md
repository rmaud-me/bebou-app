# Changelog

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
