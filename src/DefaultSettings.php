<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession;

class DefaultSettings implements SettingsInterface
{
    public function getSessionOptions(): array
    {
        return [
            'name' => "partitioned-session",
            'lifetime' => 60 * 60 * 24,
            'cookie_samesite' => 'None',
            'secure' => true,
            'httponly' => true,
            'partitioned' => true // doesn't do anything, but true
        ];
    }
}
