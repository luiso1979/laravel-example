<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Shows hello world
	 *
	 * @return Response
	 */
	public function helloworld()
	{
		return [
			'response' => 'Hello world'
        ];
	}

}