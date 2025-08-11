<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession;

use GrotonSchool\Slim\LTI\PartitionedSession\Actions\FirstPartyLaunchAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Actions\RequestStorageAccessAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Actions\ThirdPartyCookieAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Actions\ValidateSessionAction;
use GrotonSchool\Slim\LTI\PartitionedSession\Middleware\PartitionedSessionStartMiddleware;
use GrotonSchool\Slim\Norms\RouteBuilderInterface;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface;
use Slim\Interfaces\RouteGroupInterface;

class RouteBuilder implements RouteBuilderInterface
{
    public static function define(App $app): RouteGroupInterface
    {
        return $app->group('/lti', function (RouteCollectorProxyInterface $session) {
            $session->get('/third-party-cookies', ThirdPartyCookieAction::class);
            $session->get('/first-party-launch', FirstPartyLaunchAction::class);
            $session->get('/request-storage-access', RequestStorageAccessAction::class);
            $session->get('/validate-session', ValidateSessionAction::class);
        })
            ->add(PartitionedSessionStartMiddleware::class);
    }
}
