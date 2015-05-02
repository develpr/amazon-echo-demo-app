<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Request\IntentRequest;
use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Speech;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	private $meals = [
		"pizza" => "Pizza is very healthy, so I think that was a pretty smart thing to choose to eat!",
		"sashimi" => "What a fancy person you are! You must be rich!!",
		"ramen" => "Awesome choice, I'd recommend a tonkotsu ramen!"
	];

    public function launch()
	{
		$alexaResponse = new AlexaResponse;

		$wordsToSpeak = "Hello! Your choices for a meal include " . implode(', ', array_keys($this->meals));

		$speech = new Speech($wordsToSpeak);

		$card = new Card("Hello!", "Your choices", $wordsToSpeak);

		$alexaResponse->setSpeech($speech)->setCard($card);

		return $alexaResponse;
	}

	public function chooseMeal(IntentRequest $intentRequest)
	{


		$previousMeal = \Session::get('previousMeal');

		$choice = strtolower($intentRequest->slot('Meal'));

		$alexaResponse = new AlexaResponse;

		$wordsToSpeak = "Great choice! ";

		if($previousMeal)
			$wordsToSpeak .= "Last time you had $previousMeal. ";

		if($choice && array_key_exists($choice, $this->meals))
			$wordsToSpeak .= $this->meals[$choice];

		$speech = new Speech($wordsToSpeak);

		\Session::put('previousMeal', $choice);

		$alexaResponse->setSpeech($speech)->endSession();

		return $alexaResponse;

	}

	public function end()
	{
		return new AlexaResponse(null, null, true);
	}
}
