<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Speech;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function launchRequest()
	{
		$alexaResponse = new AlexaResponse();
		$speech = new Speech('Welcome to the meal planning app');
		$card = new Card("Thank You - Meal App", "", "Thanks for using the meal app!");

		$alexaResponse->setSpeech($speech)->setCard($card);;

		return $alexaResponse;

	}
}
