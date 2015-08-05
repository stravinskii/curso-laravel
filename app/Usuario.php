<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /**
     * Indica si el modelo debe tener columnas de tiemstamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define la relacion uno a uno con el modelo Persona
     *
     * @return App\Persona
     */
    public function persona()
    {
    	return $this->belongsTo('App\Persona');
    }
}
