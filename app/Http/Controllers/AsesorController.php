<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Usuario; //Insertar datos en la tabla usuarios
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asesores = Asesor::all();
        //dd($asesores); //para ver que hay en esa variable
        return view("asesor/indexAsesor",compact('asesores'));//<----- regresar vista al llamar al archivo index (asesor)
        //compact es para enviar al archhivo todos los datos de la variable asesores 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asesor/createAsesor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ ///Validar datos, si los datos recibidos no cumplen estas regresas no les permite la entrada a la base de datos y regresa a la pagina original
            //'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            //'telefono' => ['required','min:10','max:10']
            'telefono' => ['nullable','numeric','regex:/^\d{10}$/',],
        ]);
    
        $asesor = new Asesor(); //quiero una nueva instanciade este modelo que va a representar mi tabla (representante de alto nivel)
        //Contacto --> a las clases se les nombra con matusculas (modelos)        
        //$usuario->comentario = $request->comentario; 
        //$asesor->pass = $request->pass;

        $asesor->usuario = $request->usuario;
        $asesor->nombre = $request->nombre;
        $asesor->correo = $request->correo; //asignari atributos que corresonden por como se llaman mis columnas
        $asesor->telefono = $request->telefono;
        $asesor->escuela = $request->escuela;
        $asesor->save();

        //Insertar en la tabla usuarios
        $usuario = new Usuario(); //quiero una nueva instanciade este modelo que va a representar mi tabla (representante de alto nivel)
        $usuario->usuario = $request->usuario;
        $usuario->mail = $request->correo; //asignari atributos que corresonden por como se llaman mis columnas
        $usuario->pass = $request->pass;
        $usuario->save();
    
        return redirect('/asesor'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Asesor $asesor)
    {
        return view('asesor/showAsesor',compact('asesor')); //asesor es el usuario actual a mostrar
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asesor $asesor)
    {
        // Obtener un asesor por su ID
        /*$asesor = Asesor::findOrFail($asesor);

        // Acceder a la columna 'pass' del usuario relacionado
        $password = $asesor->usuario->pass;*/

        //dd($password);

        //$password = $asesor->usuario;

        //return view('asesor/editAsesor',compact('asesor','password')); 
        return view('asesor/editAsesor',compact('asesor')); //formulario para editar la base, asesor es el usuario a editar
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asesor $asesor) ///las reglas del store y el update deben ser las mismas o muy parecidas
    {
        $asesor -> usuario = $request -> usuario; //Usuario no debe poder modificarse
        $asesor -> nombre = $request -> nombre;
        $asesor -> correo = $request -> correo;
        $asesor -> telefono = $request -> telefono;
        $asesor -> escuela = $request -> escuela;
        $asesor -> save();
        return redirect() -> route('asesor.show',$asesor); //esto corresponde a el listado de route:list 
        // como estoy mandando a show, necesito mandarle el id del usuario como egundo parametro $asesor <-- este es mi asesor actual
        //return redirect("/asesor/show"); //es lo mismo que esto
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asesor $asesor)
    {
        $asesor -> delete();
        return redirect('/asesor');
    }
}
