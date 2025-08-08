<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use Dflydev\FigCookies\FigRequestCookies;
use Dflydev\FigCookies\Modifier\SameSite;
use Dflydev\FigCookies\SetCookie;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ThirdPartyCookieAction extends AbstractViewsAction
{
    public const COOKIE_NAME = 'third-party-cookie';

    public static function cookie()
    {
        return SetCookie::createRememberedForever(self::COOKIE_NAME)
            ->withValue('true')
            ->withPath('/')
            ->withSecure()
            ->withSameSite(SameSite::none())
            ->withPartitioned();
    }

    protected function invokeHook(
        ServerRequest $request,
        Response $response
    ): ResponseInterface {
        $cookie = FigRequestCookies::get($request, self::COOKIE_NAME);
        if ($cookie->getValue()) {
            return $response->withRedirect(
                '/lti/validate-session?' . ValidateSessionAction::PARAM_SESSION . '=' . $request->getQueryParam(ValidateSessionAction::PARAM_SESSION)
            );
        } else {
            return $this->views->render(
                $response,
                'firstPartyLaunchRequest.php',
                [
                    'title' => 'Third Party Cookie Test'
                ]
            );
        }
    }
}
