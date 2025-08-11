<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession;

use DI;
use DI\ContainerBuilder;
use GrotonSchool\Slim\LTI\Handlers\LaunchHandlerInterface;
use GrotonSchool\Slim\LTI\PartitionedSession\PartitionedSession;
use GrotonSchool\Slim\LTI\PartitionedSession\Handlers\LaunchHandler;
use GrotonSchool\Slim\Norms\DependenciesInterface;
use Odan\Session\SessionInterface;
use Odan\Session\SessionManagerInterface;
use Psr\Container\ContainerInterface;

class Dependencies implements DependenciesInterface
{
    public static function inject(ContainerBuilder $containerBuilder): void
    {
        $containerBuilder->addDefinitions([
            LaunchHandlerInterface::class => DI\autowire(LaunchHandler::class),

            SessionManagerInterface::class => DI\get(SessionInterface::class),
            SessionInterface::class => function (ContainerInterface $container) {
                $options = $container->get(SettingsInterface::class)->getSessionOptions();
                return new PartitionedSession($options);
            }
        ]);
    }
}
