<?php namespace App\AlexaApp\Middleware;

use App\AlexaApp\Request\AlexaRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;

class StartEchoSession extends StartSession {

    /**
     * Get the session implementation from the manager.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Session\SessionInterface
     */
    public function getSession(Request $request)
    {
        $session = $this->manager->driver();

        $sessionId = array_get( json_decode( $request->getContent(), true ), 'session.sessionId' );

        $session->setId($sessionId);
//        $session->setId($request->cookies->get($session->getName()));

        return $session;
    }

}
