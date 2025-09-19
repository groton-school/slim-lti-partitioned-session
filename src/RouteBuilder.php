<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession;

use GrotonSchool\Slim\LTI\PartitionedSession\Actions\FirstPartyLaunchAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Actions\RequestStorageAccessAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Actions\ThirdPartyCookieAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Actions\ValidateSessionAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Middleware\PartitionedSessionMiddleware;
use GrotonSchool\Slim\Norms\RouteBuilderInterface;
use Odan\Session\Middleware\SessionStartMiddleware;
use Psr\Http\Server\MiddlewareInterface;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface;
use Slim\Interfaces\RouteGroupInterface;

class RouteBuilder implements RouteBuilderInterface
{
    public function define(App $app, MiddlewareInterface|string|callable ...$innerMiddleware): RouteGroupInterface
    {
        $group = $app->group('/lti', function (RouteCollectorProxyInterface $session) {
            $session->get('/third-party-cookies', ThirdPartyCookieAction::class);
            $session->get('/first-party-launch', FirstPartyLaunchAction::class);
            $session->get('/request-storage-access', RequestStorageAccessAction::class);
            $session->get('/validate-session', ValidateSessionAction::class);
        });

        foreach ($innerMiddleware as $middleware) {
            $group = $group->add($middleware);
        }

        return $group
            ->add(SessionStartMiddleware::class)
            ->add(PartitionedSessionMiddleware::class);
    }
}
