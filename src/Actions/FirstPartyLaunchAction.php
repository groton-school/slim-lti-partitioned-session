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
    public function __invoke(ServerRequest $request, Response $response): ResponseInterface
    {
        return FigResponseCookies::set(
            $this->views->render($response, 'firstPartyLaunch.php'),
            SetCookie::createRememberedForever(ThirdPartyCookieAction::COOKIE_NAME)
                ->withValue('true')
                ->withPath('/')
                ->withSecure()
                ->withSameSite(SameSite::none())
        );
    }
}
