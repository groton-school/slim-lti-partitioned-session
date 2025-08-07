<?php

declare(strict_type=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession;

use DI;
use DI\ContainerBuilder;
use GrotonSchool\Slim\LTI\Handlers\LaunchHandlerInterface;
use GrotonSchool\Slim\LTI\PartitionedSession\Handlers\LaunchHandler;
use Odan\Session\PhpSession;
use Odan\Session\SessionInterface;
use Odan\Session\SessionManagerInterface;
use Psr\Container\ContainerInterface;

class Dependencies
{
    public static function inject(ContainerBuilder $containerBuilder)
    {
        $containerBuilder->addDefinitions([
            LaunchHandlerInterface::class => DI\autowire(LaunchHandler::class),

            SessionManagerInterface::class => DI\get(SessionInterface::class),
            SessionInterface::class => function (ContainerInterface $container) {
                $options = $container->get(SettingsInterface::class)->get(SessionInterface::class);
                return new PhpSession($options);
            }
        ]);
    }
}
