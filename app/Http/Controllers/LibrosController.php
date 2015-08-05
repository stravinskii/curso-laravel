<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libro;
use App\Editorial;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('libros.index')->with('libros', Libro::all());        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $editoriales = Editorial::all();
        return view('libros.create')->with('editoriales', $editoriales);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $libro = new Libro;
        // $libro->ISBN = $request->input('isbn');
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->editorial_id = $request->input('editorial');
        $libro->save();

        $libros = Libro::all();
        return view('libros.index')->with('libros', $libros);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);
        return view('libros.show')->with('libro', $libro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        $editoriales = Editorial::all();
        return view('libros.edit')->with('libro', $libro)
            ->with('editoriales', $editoriales);
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
        $libro = Libro::find($id);
        // $libro->ISBN = $request->input('isbn');
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->editorial_id = $request->input('editorial');
        $libro->save();

        $libros = Libro::all();
        return view('libros.index')->with('libros', $libros);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();

        $libros = Libro::all();
        return view('libros.index')->with('libros', $libros);
    }

    /**
     * Searches for resources with specified criteria
     *
     * @return Response
     */
    public function search(Request $request)
    {
        $libros = Libro::where('titulo', $request->input('titulo'))
            ->orWhere('autor', $request->input('autor'))
            // ->orWhere('ISBN', $request->input('isbn'))
            ->get();
        return view('libros.index')->with('libros', $libros);
    }
}
