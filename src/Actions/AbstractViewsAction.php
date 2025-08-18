<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use GrotonSchool\Slim\Norms\AbstractAction;
use Slim\Views\PhpRenderer;

abstract class AbstractViewsAction extends AbstractAction
{
    protected PhpRenderer $views;

    public function __construct()
    {
        $this->views = new PhpRenderer(__DIR__ . '/../../views');
    }
}
