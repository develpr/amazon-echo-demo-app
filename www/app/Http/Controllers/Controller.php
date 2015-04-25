<?php namespace App\Http\Controllers;

use App\AlexaApp\Response\AlexaResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Show the profile for the given user.
     *
     * @return AlexaResponse
     */
    public function showProfile()
    {
        $test = "HI";
        return new AlexaResponse(null, null, true);
    }
}
