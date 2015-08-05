<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
	/**
     * La tabla de la base de datos asociada al modelo.
     *
     * @var string
     */
    // protected $table = 'cat_libros';

    /**
     * Indica si el modelo debe tener columnas de tiemstamps.
     *
     * @var bool
     */
    // public $timestamps = false;

    // public $primaryKey = 'ISBN';

    /**
     * Define la relación uno a varios con el modelo Editorial
     *
     * @return App\Editorial
     */
    public function editorial()
    {
        return $this->belongsTo('App\Editorial');
    }

    /**
     * Define la relación de many to many con Persona.
     *
     * @return App\Persona
     */
    public function personas()
    {
        return $this->belongsToMany(
            'App\Persona',
            'persona_libro',
            'id_libro',
            'id_persona'
        );
    }
}
