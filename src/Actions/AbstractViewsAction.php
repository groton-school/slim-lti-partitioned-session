<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use Slim\Views\PhpRenderer;

abstract class AbstractViewsAction
{
    protected PhpRenderer $views;

    public function __construct()
    {
        $this->views = new PhpRenderer(__DIR__ . '/../../views');
        $this->views->setLayout('layout.php');
    }
}
