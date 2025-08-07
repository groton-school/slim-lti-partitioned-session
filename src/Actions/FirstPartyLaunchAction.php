<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\Modifier\SameSite;
use Dflydev\FigCookies\SetCookie;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class FirstPartyLaunchAction extends AbstractViewsAction
{
    public static function cookie()
    {
        return SetCookie::createRememberedForever('first-party')
            ->withValue('true')
            ->withPath('/')
            ->withSecure()
            ->withSameSite(SameSite::none())
            ->withPartitioned();
    }

    public function __invoke(ServerRequest $request, Response $response): ResponseInterface
    {
        return FigResponseCookies::set(
            FigResponseCookies::set(
                $this->views->render(
                    $response,
                    'firstPartyLaunch.php',
                    [
                        'title' => 'Firat Party Context'
                    ]
                ),
                ThirdPartyCookieAction::cookie()
            ),
            self::cookie()
        );
    }
}
