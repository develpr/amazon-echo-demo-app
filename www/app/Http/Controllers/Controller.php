<?php namespace App\Http\Controllers;

use Develpr\AlexaApp\Request\IntentRequest;
use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Speech;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;


class Controller extends BaseController
{
	private $meals = [
		"pizza" => "Pizza is a really good option, both delicious and healthy!",
		"sashimi" => "Sashimi will be expensive but very good.",
		"ramen" => "I'd go with a pork forward tonkotsu ramen."
	];
    public function launchRequest()
	{
		$alexaResponse = new AlexaResponse();

		$speech = new Speech('Welcome to the meal planning app');

		$card = new Card("Thank You - Meal App", "", "Thanks for using the meal app!");

		$alexaResponse->setSpeech($speech)->setCard($card);;

		return $alexaResponse;
	}

	public function listMeals()
	{
		$words = "You can choose from ";

		$words .= implode(", ", array_keys($this->meals));

		return new AlexaResponse(new Speech($words));

	}

	public function chooseMeal(IntentRequest $intentRequest)
	{
		$choice = $intentRequest->token('Meal');

		$responses = ["Interesting choice... ", "Very good choice! "];
		$words = $responses[array_rand($responses)];

		if($choice && in_array(strtolower($choice), array_keys($this->meals)))
			$words .= $this->meals[$choice];

		return ((new AlexaResponse(new Speech($words)))->endSession());

	}

	public function endSession()
	{
		return (new AlexaResponse())->endSession();
	}
}
