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

$app->get('/', function() use ($app) {

    var_dump($app->make('blah'));

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

    $stuff = json_decode($request, true);

//    return var_dump($stuff);

    return array_get($stuff, 'session.sessionId');
});

$app->post('/', function() use ($app) {

});
