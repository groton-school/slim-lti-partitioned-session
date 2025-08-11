<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI\PartitionedSession\Middleware;

use GrotonSchool\Slim\LTI\PartitionedSession\Actions\ValidateSessionAction;
use Odan\Session\SessionManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PartitionedSessionStartMiddleware implements MiddlewareInterface
{
    public function __construct(private SessionManagerInterface $session)
    {
    }

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        // TODO there should really be some security on this session parameter (a nonce?)
        $sessionId = $request->getQueryParams()[ValidateSessionAction::PARAM_SESSION] ?? null;
        if ($sessionId) {
            session_id($sessionId);
        }

        if (!$this->session->isStarted()) {
            $this->session->start();
        }

        $response =  $handler->handle($request);

        $this->session->save();

        return $response;
    }
}
