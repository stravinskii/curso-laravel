<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    /**
     * La tabla de la base de datos asociada al modelo.
     *
     * @var string
     */
    protected $table = 'editoriales';

    /**
     * Indica si el modelo debe tener columnas de tiemstamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define la relación uno a varios con el modelo de Libro
     *
     * @return App\Libro
     */
    public function libros()
    {
    	return $this->hasMany('App\Libro');
    }
}
