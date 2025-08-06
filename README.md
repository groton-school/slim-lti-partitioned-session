# groton-school/slim-lti-partitioned-session

Negotiate CHIPS partitioned third party session cookies from an embedded LTI Tool

[![Latest Version](https://img.shields.io/packagist/v/groton-school/slim-lti-partitioned-session.svg)](https://packagist.org/packages/groton-school/slim-lti-partitioned-session)

# Install

```shell
composer require groton-school/slim-lti-partitioned-session
```

# Use

See [groton-school/slim-skeleton](https://github.com/groton-school/slim-skeleton) for sample usage.

# How

Given the insidiuous prevalance of user-tracking web technologies, and the use of third-party cookies to facilitate them, many browsers have imposed hard limits on the use of third-party cookies. This is awkward, because the LTI standard is built on the assumption that a) third-party cookies will be readily available for the OIDC handshake and launch and b) most resources will be embedded in a third-party IFRAME context.

This package provides a modified `LaunchHandler` compatible with [groton-school/slim-lti-shim](https://github.com/groton-school/slim-lti-shim) that injects a third-party cookie test into the LTI Tool launch. This is paired with the `PartitionedSession` middleware that ensures that a) all session cookies are sent as both `Secure` and `Partitioned` (which is enough for Chromium-based browsers).

If third-party cookies cannot be initially set (as is the case when working with Safari and other WebKit-based browsers using [ITP](https://www.cookiestatus.com/safari/)), a more interactive permissions-handshake with the user is required. The package negotiates this handshake and then uses the `PartitionedSession` middleware to resume the originally-launched LTI Tool session and provide the LTI resource.

![sequence diagram](./docs/sequence.png)
