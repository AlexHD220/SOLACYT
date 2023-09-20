<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("usuario/indexUsuario"); //<----- regresar vista al llamar al archivo index (usuario)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario/createUsuario');
    }


    /*public function contactoForm($tipo = null){
        return view('contacto', compact('tipo'));
    }*/


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ ///Validar datos, si los datos recibidos no cumplen estas regresas no les permite la entrada a la base de datos y regresa a la pagina original
            'correo' => 'required|email',
            //'comentario' => ['required','min:10','max:50'], //requerido minio 10 caracteres
        ]);
    
        $usuario = new Usuario(); //quiero una nueva instanciade este modelo que va a representar mi tabla (representante de alto nivel)
        //Contacto --> a las clases se les nombra con matusculas (modelos)
        $usuario->mail = $request->correo; //asignari atributos que corresonden por como se llaman mis columnas
        //$usuario->comentario = $request->comentario; 
        $usuario->usuario = $request->usuario;
        $usuario->save();
    
        return redirect('/usuario'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
