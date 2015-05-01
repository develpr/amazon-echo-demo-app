<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Speech;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	private $meals = [
		"pizza",
		"sashimi",
		"ramen",
		"tacos"
	];

	public function launch()
	{
		$alexaResponse = new AlexaResponse;

		$words = "Welcome! Please choose from these meal options: ";

		$words .= implode(', ', $this->meals);

		$speech = new Speech($words);

		$card = new Card("Welcome!", "Please choose..", $words);

		$alexaResponse->setSpeech($speech)->setCard($card);

		return $alexaResponse;
	}
}
