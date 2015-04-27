<?php

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


$app->intent('/family', 'TellAboutMember', 'App\Http\Controllers\FamilyController@tellAboutMember');

$app->launchRequest('/chooser', 'App\Http\Controllers\ChooseController@launch');
$app->intent('/chooser', 'ChooseBetweenX', 'App\Http\Controllers\ChooseController@chooseBetweenX');


$app->get('/', function() use ($app) {
    return '<html>
    <head></head>
    <body>
    <form action="/chooser" method="post">
    <textarea style="width:400px; height:600px;" name="content"></textarea>
    <input type="submit" />
    </form>
    </body>
    </html>';

//
	//launch
    $request = '{
  "version": "1.0",
  "session": {
    "new": true,
    "sessionId": "amzn1.echo-api.session.abeee1a7-aee0-41e6-8192-e6faaed9f5ef",
    "attributes": {},
    "user": {
      "userId": "amzn1.account.AM3B227HF3FAM1B261HK7FFM3A2"
    }
  },
  "request": {
    "type": "LaunchRequest",
    "requestId": "amzn1.echo-api.request.9cdaa4db-f20e-4c58-8d01-c75322d6c423"
  }
}';

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
      "name": "GetAntiJoke",
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

