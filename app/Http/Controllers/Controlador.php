<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
