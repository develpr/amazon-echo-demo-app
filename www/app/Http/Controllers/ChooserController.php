<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Request\LaunchRequest;
use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Request\IntentRequest;
use Develpr\AlexaApp\Request\AlexaRequest;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Speech;

use Laravel\Lumen\Routing\Controller as BaseController;

class ChooserController extends BaseController
{
    /**
     * Show the profile for the given user.
     *
     * @return AlexaResponse
     */
    public function chooseBetweenX(IntentRequest $intentRequest)
    {

    }

	public function launch(LaunchRequest $launchRequest)
	{
		return new AlexaResponse(new Speech('Welcome to this fantastic app!'));
	}
}
