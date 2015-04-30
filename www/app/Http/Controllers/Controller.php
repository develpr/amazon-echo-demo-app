<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Response\AlexaResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function launch()
	{
		$toSay = "Welcome to the amazing meal planning app!";

		$alexaResponse = new AlexaResponse;

		$alexaResponse->setSpeech(new Speech($toSay))->setCard(new Card('Welcome!', 'Thanks for using the app!', $toSay));

		return $alexaResponse;
	}
}
