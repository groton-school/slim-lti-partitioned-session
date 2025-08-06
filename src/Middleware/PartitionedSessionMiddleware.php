<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Middleware;

use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\Modifier\SameSite;
use Dflydev\FigCookies\SetCookie;
use GrotonSchool\Slim\LTI\PartitionedSession\Actions\ValidateSessionAction;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PartitionedSessionMiddleware implements MiddlewareInterface
{
    /**
     * @param SetCookie|string|null $setCookieOrId
     */
    public static function cookie(mixed $setCookieOrId = null)
    {
        if ($setCookieOrId instanceof SetCookie) {
            $setCookie = $setCookieOrId;
        } else {
            $setCookie = SetCookie::create(session_name());
        }
        if (is_string($setCookieOrId)) {
            $sessionId = $setCookieOrId;
        } else {
            $sessionId = session_id();
        }
        $params = session_get_cookie_params();
        foreach ($params as $param => $value) {
            switch ($param) {
                case 'lifetime':
                    $setCookie = $setCookie
                        ->withMaxAge($value)
                        ->withExpires(time() + $value);
                    break;
                case 'path':
                    $setCookie = $setCookie->withPath($value);
                    break;
                case 'domain':
                    $setCookie = $setCookie->withDomain($value);
                    break;
                case 'secure':
                    $setCookie = $setCookie->withSecure($value);
                    break;
                case 'httponly':
                    $setCookie = $setCookie->withHttpOnly($value);
                    break;
                case 'samesite':
                    $setCookie = $setCookie->withSameSite(SameSite::fromString($value));
                    break;
            }
        }
        return $setCookie
            ->withValue($sessionId)
            ->withPartitioned();
    }

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        /*
         * In an ideal world, we would disable session cookies, but we
         * rely on Odan\Session\PhpSession to manage session logic, which
         * _does_ use session cookies. So, instead, we will re-write the
         * session cookie as partitioned and rely on Chromium and WebKit
         * to accept the last cookie version set as final.
         */
        $sessionId = $request->getQueryParams()[ValidateSessionAction::PARAM_SESSION] ?? null;
        if ($sessionId) {
            session_id($sessionId);
        }
        $response = $handler->handle($request);
        return FigResponseCookies::modify(
            $response,
            session_name(),
            fn ($setCookie) => PartitionedSessionMiddleware::cookie($setCookie)
        );
    }
}
