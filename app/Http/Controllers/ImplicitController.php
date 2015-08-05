<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Todo método declarado en un controlador implícito
 * debe comenzar con el sufijo de un método HTTP, es decir
 * que debe ser (get, post, put, delete) seguido de el nombre
 * de la ruta que tendrá anidada a la declarada en routes.php
 *
 */
class ImplicitController extends Controller
{
	/**
	 * Responde a la ruta /api/array con método GET
	 *
	 * @return array
	 */
	public function getArray()
	{
		$sentence = "This is an array";
		return explode(' ', $sentence);
	}

	/**
	 * Responde a la ruta /api/json con método GET
	 *
	 * @return JSON 
	 */
	public function getJson()
	{
		$response = [
			'text' => 'This is a JSON object'
		];
		return json_encode($response);
	}
}
