<?php  namespace App\AlexaApp; 

use Laravel\Lumen\Application;

class AlexaApplication extends Application
{
    private $intentRoutes = [];

    public function intent($uri, $intent, $action)
    {
        $this->intentRoutes[] = $uri;

        $this->addRoute('INTENT', '*' . $intent, $action);

        return $this;
    }

    public function launchRequest($uri, $action)
    {
        $this->intentRoutes[] = $uri;
        $this->addRoute('INTENT', '**' . 'LAUNCH_REQUEST', $action);
    }

    public function sessionEnd($uri, $action)
    {

    }

    protected function getMethod()
    {
        $method = parent::getMethod();

        if($this->isRouteWithIntent())
        {
            $method = "INTENT";
        }

        return $method;
    }

    public function getPathInfo()
    {
        $pathInfo = parent::getPathInfo();

        if($this->isRouteWithIntent())
        {
            $intentRelated = $this->getIntentFromRequest();


            $pathInfo = '/' . $intentRelated;
        }

        return $pathInfo;

    }


    /**
     * Has a route been registered to this path with an Intent?
     *
     * @return bool
     */
    private function isRouteWithIntent()
    {
        return ( parent::getMethod() == "POST" && in_array(parent::getPathInfo(), $this->intentRoutes) );
    }

    private function getIntentFromRequest()
    {
        //todo: this thing right here!
        $request = $this->make('request');


        $data = $request->getContent();

        switch(array_get($data, 'request.type')){
            case 'SessionEndRequest':
                return '**' . "SESSION_END_REQUEST";
        }

        return '*' . ltrim('GetAntiJoke');
    }


} 