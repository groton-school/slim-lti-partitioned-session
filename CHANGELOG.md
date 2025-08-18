<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

## [1.3.3](https://github.com/groton-school/slim-lti-partitioned-session/compare/v1.3.2...v1.3.3) (2025-08-18)

### Bug Fixes

* Fully initialize ValidateSessionAction ([6d6b9a](https://github.com/groton-school/slim-lti-partitioned-session/commit/6d6b9ad87ba5ab4460f693a6397a2341bebe1ad7))


---

## [1.3.2](https://github.com/groton-school/slim-lti-partitioned-session/compare/v1.3.1...v1.3.2) (2025-08-13)

### Bug Fixes

* Override incompatible `samesite` options with `none` ([135409](https://github.com/groton-school/slim-lti-partitioned-session/commit/13540931cffdda7643c488cd9f4c1c297b8093cd))
* Remove extraneous console output ([3ce59c](https://github.com/groton-school/slim-lti-partitioned-session/commit/3ce59cf7a4bbda91222f9b3132e4ab26d2e85ab6))


---

## [1.3.1](https://github.com/groton-school/slim-lti-partitioned-session/compare/v1.3.0...v1.3.1) (2025-08-12)

### Bug Fixes

* `DefaultSettings` redirect to `/` after validating session ([4739a8](https://github.com/groton-school/slim-lti-partitioned-session/commit/4739a811ae2ee5574bd9ba076e866ef327139717))


---

## [1.3.0](https://github.com/groton-school/slim-lti-partitioned-session/compare/v1.2.0...v1.3.0) (2025-08-12)

### Features

* Configurable redirect after validated session ([4ddd9f](https://github.com/groton-school/slim-lti-partitioned-session/commit/4ddd9fd061e1534f7f3bfe900623e9c1aa009fb2))


---

## [1.2.0](https://github.com/groton-school/slim-lti-partitioned-session/compare/v1.1.0...v1.2.0) (2025-08-07)

### Features

* Add Bootstrap to views ([3262bc](https://github.com/groton-school/slim-lti-partitioned-session/commit/3262bc90fc9b67e5d09c077f0a670b4526b174ce))
* Add separate first-party cookie ([943f79](https://github.com/groton-school/slim-lti-partitioned-session/commit/943f79c93cd36be275e68314bd59a052a7f5dac2))
* Provide `DefaultSettings` ([d3d12e](https://github.com/groton-school/slim-lti-partitioned-session/commit/d3d12e00d0e8a10866f44c922fcb428e1e8f9676))
* Third-party cookie is long-lasting to preserve login/permissions ([e7d9a2](https://github.com/groton-school/slim-lti-partitioned-session/commit/e7d9a2c2131c492119db519c342e423a7b6810d1))
* Use `RouteBuilder::define()` to define cookie-negotiation routes ([ab1bc1](https://github.com/groton-school/slim-lti-partitioned-session/commit/ab1bc1c195f0173bef70edd13f15a384081f2347))


---

## [1.1.0](https://github.com/groton-school/slim-lti-partitioned-session/compare/v1.0.0...v1.1.0) (2025-08-07)

### Features

* Add viewport config to views for mobile ([0e99e2](https://github.com/groton-school/slim-lti-partitioned-session/commit/0e99e26f19caec692f23bd5338d8ff4a0a502eb0))
* Improve user-facing explanation of permission request ([d6d3a1](https://github.com/groton-school/slim-lti-partitioned-session/commit/d6d3a122525c668a8966ab62cc1c5ad34234df70))

### Bug Fixes

* Rename `PartitionSession` to `PartitionSessionMiddleware` ([ae90a6](https://github.com/groton-school/slim-lti-partitioned-session/commit/ae90a66073a12188dae7c84b8630d5857306f619))
* Rename `ValidateSessionAction::PARAM_NAME` to `PARAM_SESSION` ([c93e61](https://github.com/groton-school/slim-lti-partitioned-session/commit/c93e61d0c2863abe6a624f30c7c7e815ca79ee5f))


---

## [1.0.0](https://github.com/groton-school/slim-lti-partitioned-session/compare/e4d134a1a1ae367a7164a8e1d75f0c4646231c38...v1.0.0) (2025-08-06)

### Features

* Add LaunchHandler ([544c9b](https://github.com/groton-school/slim-lti-partitioned-session/commit/544c9b8c4fe43cbacbbc6d6e254ca62467d233c1))

### Bug Fixes

* Case-sensitive namespace ([fd38f9](https://github.com/groton-school/slim-lti-partitioned-session/commit/fd38f9273a6759f0d2db3ffbfd520a181bdcc452))


---

