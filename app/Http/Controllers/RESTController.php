<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libro;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RESTController extends Controller
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
        $libro = new Libro;
        // $libro->ISBN = $request->input('isbn');
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->save();
        return view('libros.index')->with('libros', Libro::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('libros.show')->with('libro', Libro::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('libros.edit')->with('libro', Libro::find($id));;
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
        $libro->save();

        return view('libros.index')->with('libros', Libro::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Libro::find($id)->delete();
        return view('libros.index')->with('libros', Libro::all());
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
