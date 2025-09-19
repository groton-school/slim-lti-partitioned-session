<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Actions;

use GrotonSchool\Slim\LTI\PartitionedSession\SettingsInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ValidateSessionAction extends AbstractViewsAction
{
    public const PARAM_SESSION = 'session';

    public function __construct(
        private SettingsInterface $settings
    ) {
        parent::__construct();
    }

    protected function invokeHook(
        ServerRequest $request,
        Response $response,
        array $args = []
    ): ResponseInterface {
        if (session_id() !== $request->getQueryParam(self::PARAM_SESSION)) {
            return $this->views->render(
                $response,
                'sessionFail.php',
                [
                    'title' => 'Cannot set session cookie'
                ]
            );
        }
        return $this->views->render(
            $response,
            'redirect.php',
            [
                'title' => 'Redirect',
                'url' => $this->settings->getValidatedSessionRedirectUrl()
            ]
        );
    }
}
