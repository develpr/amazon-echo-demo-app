<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Speech;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function launch()
	{
		$responseWords = "Hello, and welcome to this fantastic meal planning app!";

		$alexaResponse = new AlexaResponse;


		$alexaResponse->setSpeech(new Speech($responseWords))->setCard(new Card('Welcome!', 'Thank you!', 'Welcome and thank you for using our app!'));

		return $alexaResponse;
	}
}
