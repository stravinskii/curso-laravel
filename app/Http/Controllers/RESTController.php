<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RESTController extends Controller
{
    private $libros = [
        ['titulo' => '100 años de soledad', 
        'autor' => 'Gabriel García Márquez'],

        ['titulo' => 'Ensayo sobre la ceguera', 
        'autor' => 'José Saramago'],

        ['titulo' => 'Las batallas en el desierto', 
        'autor' => 'José Emilio Pacheco'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('libros.index')->with('libros', $this->libros);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('libros.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $libro = [
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor')
        ];
        $this->libros[] = $libro;
        return view('libros.index')->with('libros', $this->libros);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $context = [
            'id' => $id,
            'libro' => $this->libros[$id]
        ];
        return view('libros.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $context = [
            'id' => $id,
            'libro' => $this->libros[$id]
        ];
        return view('libros.edit', $context);
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
        $libro = $this->libros[$id];
        $libro['titulo'] = $request->input('titulo');
        $libro['autor'] = $request->input('autor');
        $this->libros[$id] = $libro;
        return view('libros.index')->with('libros', $this->libros);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        unset($this->libros[$id]);
        return view('libros.index')->with('libros', $this->libros);
    }
}
