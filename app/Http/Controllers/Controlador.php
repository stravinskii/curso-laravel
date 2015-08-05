<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Este es un controlador sencillo, del cual haremos uso en routes.php
 * declarando una ruta y el método que queremos responda en la aplicación
 */
class Controlador extends Controller
{
    /**
     * Método que devuelve un 'Hola Mundo!'
     * @return {String} 
     */
    public function holaMundo()
    {
        return '¡Hola Mundo! @ Controlador';
    }    
}
