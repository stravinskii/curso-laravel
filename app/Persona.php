<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * La tabla de la base de datos asociada al modelo.
     *
     * @var string
     */
    protected $table = 'persona';

    /**
     * Indica si el modelo debe tener columnas de tiemstamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define la relación de uno a uno con Usuario
     *
     * @return App\Usuario
     */
    public function usuario()
    {
        return $this->hasOne('App\Usuario');
    }

    /**
     * Define la relación de many to many con Persona
     *
     * @return App\Persona
     */
    public function libros()
    {
        return $this->belongsToMany(
            'App\Libro', 
            'persona_libro', 
            'id_persona', 
            'id_libro'
        );
    }

    /**
     * Define un atributo del modelo para el nombre completo
     *
     * @return string
     */
    public function getNombreCompletoAttribute()
    {
        $atributos = [
            $this->nombre, 
            $this->apellido_paterno, 
            $this->apellido_materno
        ];
        return implode(' ', $atributos);
    }

    /**
     * Define un 'accessor' para el atributo de nombre
     * Dandole formato cada que utilizamos el atributo
     *
     * @param nombre - el atributo a modificar
     * @return string
     */
    public function getNombreAttribute($nombre)
    {
        return ucwords($nombre);
    }

    /**
     * Define un 'mutator' que modificará un valor del modelo
     * cada vez que intentemos guardarlo en la base de datos
     *
     * @param apellido_paterno - el atributo a modificar
     */
    public function setApellidoPaternoAttribute($apellido_paterno)
    {
        $this->attributes['apellido_paterno'] = ucwords($apellido_paterno);
    }
}
