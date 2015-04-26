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

$app->intent('/chooser', 'ChooseBetweenX', 'App\Http\Controllers\ChooseController@chooseBetweenX');


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

