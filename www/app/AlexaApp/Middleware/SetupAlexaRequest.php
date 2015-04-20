<?php  namespace App\AlexaApp\Middleware; 

use App\AlexaApp\Request\AlexaRequest;
use App\AlexaApp\Request\IntentRequest;
use App\AlexaApp\Request\LaunchRequest;
use App\AlexaApp\Request\SessionEndRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;
use Closure;

class SetupAlexaRequest implements Middleware
{
    const LAUNCH_REQUEST = 'LaunchRequest';
    const INTENT_REQUEST = 'IntentRequest';
    const SESSION_ENDED_REQUEST = 'SessionEndedRequest';

    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $app;

    function __construct(Application $app)
    {

        $this->app = $app;
    }

    /**
     * @param Request $request
     * @param callable $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->app->singleton('AlexaRequest', function($request) {
            /** @var Request $request */
            switch(array_get(json_decode($request->getContent(), true), 'request.type')) {
                case self::LAUNCH_REQUEST:
                    return new LaunchRequest($request);
                case self::INTENT_REQUEST:
                    return new IntentRequest($request);
                case self::SESSION_ENDED_REQUEST:
                    return new SessionEndRequest($request);
            }
        });

        return $next($request);
    }
} 