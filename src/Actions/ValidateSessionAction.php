<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use Dflydev\FigCookies\FigResponseCookies;
use GrotonSchool\Slim\LTI\PartitionedSession\Middleware\PartitionedSessionMiddleware;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ValidateSessionAction extends AbstractViewsAction
{
    public const PARAM_SESSION = 'session';

    public function __invoke(ServerRequest $request, Response $response): ResponseInterface
    {
        $sessionId = $request->getQueryParam(self::PARAM_SESSION);
        if ($sessionId) {
            $response = $response->withAddedHeader('Location', '/');
            if ($sessionId !== session_id()) {
                $response = FigResponseCookies::set(
                    $response,
                    PartitionedSessionMiddleware::cookie($sessionId)
                );
            }
        } else {
            $response = $this->views->render($response, 'error.php', [
                'error' => 'Bad Request',
                'message' => 'Unable to validate session.'
            ])->withStatus(400);
        }
        return $response;
    }
}
