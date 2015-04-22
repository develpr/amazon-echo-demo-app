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

        //todo: remove this after testing
//        $content = $request->getContent();
        $content = $request->input('content');

        $sessionId = array_get( json_decode($content, true ), 'session.sessionId' );

//        $sessionId = str_replace('.', '', $sessionId);
//        $sessionId = str_replace('amzn1echo-apisession', '', $sessionId);
//        $sessionId = str_replace('-', '', $sessionId);
//
//        $strleng = strlen($sessionId);

        $sessionId = 'abcd123';


        $session->setId($sessionId);
//        $session->setId($request->cookies->get($session->getName()));

        return $session;

    }

}
