<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class RequestStorageAccessAction extends AbstractViewsAction
{
    public function __invoke(ServerRequest $request, Response $response): ResponseInterface
    {
        return $this->views->render(
            $response,
            'requestStorageAccess.php',
            [
                'title' => 'Request Storage Access'
            ]
        );
    }
}
