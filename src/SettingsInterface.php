<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession;

interface SettingsInterface
{
    public function getSessionOptions(): array;
}
