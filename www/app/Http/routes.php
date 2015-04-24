<?php

use App\AlexaApp\Request\AlexaRequest;
use App\AlexaApp\Response\AlexaResponse;
use App\AlexaApp\Response\Card;
use App\AlexaApp\Response\Speech;
use App\AlexaApp\Request\IntentRequest;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->intent('/test', 'GetAntiJoke', function() use ($app) {

    dd("HI");

});


$app->get('/', function() use ($app) {
    return '<html>
    <head></head>
    <body>
    <form action="/test" method="post">
    <textarea style="width:400px; height:600px;" name="content"></textarea>
    <input type="submit" />
    </form>
    </body>
    </html>';

//
    $request = '{
  "version": "1.0",
  "session": {
    "new": false,
    "sessionId": "amzn1.echo-api.session.abeee1a7-aee0-41e6-8192-e6faaed9f5ef",
    "attributes": {
      "supportedHoroscopePeriods": {
        "daily": true,
        "weekly": false,
        "monthly": false
      }
    },
    "user": {
      "userId": "amzn1.account.AM3B227HF3FAM1B261HK7FFM3A2"
    }
  },
  "request": {
    "type": "IntentRequest",
    "requestId": " amzn1.echo-api.request.6919844a-733e-4e89-893a-fdcb77e2ef0d",
    "intent": {
      "name": "GetZodiacHoroscopeIntent",
      "slots": {
        "ZodiacSign": {
          "name": "ZodiacSign",
          "value": "virgo"
        }
      }
    }
  }
}';
//
//    $stuff = json_decode($request, true);
//
//
//
////    return var_dump($stuff);
//
//    return array_get($stuff, 'session.sessionId');

    return $app->welcome();
});

$app->post('/', function(\App\AlexaApp\Request\AlexaRequest $request) use ($app) {




});



$app->post('/test', function() use ($app){

    /** @var AlexaRequest $alexaRequest */
    $alexaRequest = $app->make(AlexaRequest::class);

    if($alexaRequest->getRequestType() == "LaunchRequest"){
        return new AlexaResponse(new Speech("Hello! What can I help you with?"));
    }
    else if($alexaRequest->getRequestType() == "SessionEndRequest"){
        return new \Illuminate\Http\Response();
    }
    else if($alexaRequest->getRequestType() == "IntentRequest"){
        /** @var IntentRequest $intentRequest */
        $intentRequest = $app->make(IntentRequest::class);

        
        if($intentRequest == "GetAntiJoke")
            return new AlexaResponse();


    }
});
