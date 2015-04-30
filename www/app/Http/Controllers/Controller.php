<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Request\IntentRequest;
use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Speech;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	public $meals = [
		"pizza" => "Pizza is really healthy and a great source of vitamins",
		"sashimi" => "Sashimi is very fancy, but super great!",
		"ramen" => "What a great choice, I'd go with the tonkotsu ramen!"
	];

    public function launch()
	{
		$responseWords = "Hello, and welcome to this fantastic meal planning app!";

		$alexaResponse = new AlexaResponse;

		$alexaResponse->setSpeech(new Speech($responseWords))->setCard(new Card('Welcome!', 'Thank you!', 'Welcome and thank you for using our app!'));

		return $alexaResponse;
	}

	public function listMeals(IntentRequest $intentRequest)
	{
		$words = ["We have a number of options. Those include ", "You have a few meal choices. Specifically, "];

		$toSpeak = $words[array_rand($words)];

		$toSpeak .= implode(", ", array_keys($this->meals));

		return new AlexaResponse(new Speech($toSpeak));
	}

	public function chooseMeal(IntentRequest $intentRequest)
	{
		$words = ["Great choice! ", "Interesting choice... "];
		$toSpeak = $words[array_rand($words)];

		$theySaid = strtolower($intentRequest->token('Meal'));

		if($theySaid && array_key_exists($theySaid, $this->meals))
			$toSpeak .= $this->meals[$theySaid];

		return new AlexaResponse(new Speech($toSpeak));

	}

	public function sessionEnded()
	{
		return ((new AlexaResponse())->endSession());
	}
}
