<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libro;
use App\Persona;
use App\Usuario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index')->with('personas', $personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->save();

        $usuario = new Usuario();
        $usuario->username = $request->input('usuario');
        $usuario->persona_id = $persona->id;
        $usuario->save();

        $personas = Persona::all();
        return view('personas.index')->with('personas', $personas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);
        return view('personas.show')->with('persona', $persona);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        return view('personas.edit')->with('persona', $persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        $persona->nombre = $request->input('nombre');
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->save();

        $usuario = Usuario::find($persona->usuario->id);
        $usuario->username = $request->input('usuario');
        $usuario->save();

        $personas = Persona::all();
        return view('personas.index')->with('personas', $personas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();

        $personas = Persona::all();
        return view('personas.index')->with('personas', $personas);
    }

    /**
     * Método que devolverá la vista para agregar un nuevo libro a la persona
     *
     * @param int $id
     * @return Response
     */
    public function agregarLibro($id)
    {
        $libros = Libro::all();
        $persona = Persona::find($id);
        return view('personas.libros.add')->with('persona', $persona)
            ->with('libros', $libros);
    }

    public function actualizarLibros(Request $request, $id)
    {
        $persona = Persona::find($id);
        $libro = Libro::find($request->input('libro'));

        $persona->libros()->attach($libro->id);
        $persona->save();

        return view('personas.show')->with('persona', $persona);
    }
}
