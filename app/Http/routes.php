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

Route::get('/', function () {
    return view('welcome');
});

// Declaración de ruta convencional
Route::get('/hola-mundo', 'Controlador@holaMundo');


// Declaración de ruta con parámetro
Route::get('/hola/{usuario}', function ($usuario) {
    return "¡Hola {$usuario}!";
});

// Declaración de ruta con parámetro opcional
Route::get('/adios/{usuario?}', function ($usuario = '') {
    return "¡Adios {$usuario}!";
});

// Declaración de ruta con reestricción de parámetros
Route::get('/numero/{numero?}', function ($numero = null) {
    $response = "Tu número es: %s";
    return sprintf($response, ($numero ?: rand()));
})
->where(['numero' => '[0-9]+']);

// Declaración de un grupo de rutas
// Nota: Las rutas se cazan de arriba a abajo
Route::group(['prefix' => 'admin'], function () {
    Route::get('/libros', function () {
        return "Esta es la sección de libros";
    });
    
    // Route::resource('/libros', 'RESTController');

    Route::get('/usuarios', function() {
        return "Esta es la sección de usuarios";
    });
});