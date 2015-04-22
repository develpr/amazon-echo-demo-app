<?php  namespace App\AlexaApp\Request; 

interface AlexaRequest
{

    /**
     * returns the request type, i.e. IntentRequest
     *
     * @return mixed
     */
    public function getRequestType();

} 