<?php  namespace App\AlexaApp\Request; 

use Illuminate\Http\Request;

abstract class AlexaRequest
{
    function __construct(Request $request)
    {

    }

} 