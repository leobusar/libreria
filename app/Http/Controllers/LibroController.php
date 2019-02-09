<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{


    function  prueba(){
        return view('libros.prueba'); 
    }

    function  prueba2($id, $name){
        //return  $id.":".$name."\n";
        return  view('librovista', ["id"=>$id,"name"=>$name]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros = Libro::paginate(10); //Libro::all();
        return view('libros.index', ["libros"=>$libros]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libro = new Libro();
        $libro->name=$request->name;
        $libro->valor=$request->valor;
        $libro->author=$request->author;

        $libro->save();
        return redirect()->route('libro.show', ["libro"=>$libro]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
        return view('libros.show', ["libro"=>$libro]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', ["libro"=>$libro]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->name=$request->name;
        $libro->valor=$request->valor;
        $libro->author=$request->author;

        $libro->save();
        return view('libros.show', ["libro"=>$libro]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
        $libro->delete();

        return redirect()->route('libro.index')->with('info', 'El libro ha sido eliminado exitosamente');

    }
}
