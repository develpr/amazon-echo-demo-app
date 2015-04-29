<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Speech;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function launchRequest()
	{
		$alexaResponse = new AlexaResponse();
		$speech = new Speech('Welcome to the meal planning app');

		$alexaResponse->setSpeech($speech);

		return $alexaResponse;

	}
}
