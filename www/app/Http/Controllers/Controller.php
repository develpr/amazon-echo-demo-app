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
		"pizza",
		"sashimi",
		"ramen",
		"garbage"
	];
    public function launchRequest(Request $request)
	{
		\Log::info($request->getContent());
		$alexaResponse = new AlexaResponse();
		$speech = new Speech('Welcome to the meal planning app');
		$card = new Card("Thank You - Meal App", "", "Thanks for using the meal app!");

		$alexaResponse->setSpeech($speech)->setCard($card);;

		return $alexaResponse;
	}

	public function listMeals(Request $request)
	{
		\Log::info($request->getContent());
		$alexaResponse = new AlexaResponse();
		
		$words = "You can choose from ";

		$words .= implode(", ", $this->meals);

		return new AlexaResponse(new Speech($words));

	}

	public function chooseMeal(IntentRequest $intentRequest)
	{

	}
}
