<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use Dflydev\FigCookies\FigResponseCookies;
use GrotonSchool\Slim\LTI\PartitionedSession\Middleware\PartitionedSessionMiddleware;
use GrotonSchool\Slim\LTI\PartitionedSession\SettingsInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ValidateSessionAction extends AbstractViewsAction
{
    public const PARAM_SESSION = 'session';

    public function __construct(private SettingsInterface $settings)
    {
        parent::__construct();
    }

    protected function invokeHook(
        ServerRequest $request,
        Response $response,
        array $args = []
    ): ResponseInterface {
        $sessionId = $request->getQueryParam(self::PARAM_SESSION);
        if ($sessionId) {
            $response = $response->withRedirect(
                $this->settings->getValidatedSessionRedirectUrl()
            );
            if ($sessionId !== session_id()) {
                $response = FigResponseCookies::set(
                    $response,
                    PartitionedSessionMiddleware::cookie($sessionId)
                );
            }
        } else {
            $response = $this->views->render(
                $response,
                'error.php',
                [
                    'title' => 'Error',
                    'error' => 'Bad Request',
                    'message' => 'Unable to validate session.'
                ]
            )->withStatus(400);
        }
        return $response;
    }
}
