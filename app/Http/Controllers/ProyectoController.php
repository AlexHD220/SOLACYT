<?php

namespace App\Http\Controllers;

use App\Mail\NotificaProyectoRegistrado;
use App\Models\Asesor;
use App\Models\Categoria;
use App\Models\Competencia;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ProyectoController extends Controller
{

    public function __construct()
    {
        //$this->middleware('can:only-user')->except('index', 'show');
        $this->middleware('can:only-user');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Uso de gate
        /*if (Gate::allows('only-user')) {
            $proyectos = Proyecto::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado
        }
        else{
            $proyectos = Proyecto::all();
        }*/

        $proyectos = Proyecto::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        //$asesores = Asesor::all();

        $asesores = Asesor::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        return view('proyecto/indexProyecto', compact('proyectos','asesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asesores = Asesor::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        $competencias = Competencia::where('tipo','Proyecto')->get();

        $categorias = Categoria::all();

        return view('proyecto/createProyecto', compact('asesores','competencias','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]); //Inyectar el user id en el request

        /*Proyecto::create($request->all());

        return redirect('/proyecto');*/

        $proyecto = Proyecto::create($request->all()); // <-- hace todo desde new hasta save

        // Insertar en la tabla pivote relacion m:n
        $proyecto->categorias()->attach($request->categoria_id); //detach() elimina de la lista el usuario que le pasemos 

        
        $competencia = Competencia::where('id',$proyecto->competencia_id)->first();        

        // Error Corregir
        //$categorias = Categoria::where('id',$proyecto->categorias->id)->get();

        Mail::to($request->user())->send(new NotificaProyectoRegistrado($proyecto, $competencia));

        return redirect()->route('proyecto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        // Uso de gate
        if (!Gate::allows('gate-proyecto', $proyecto)) {
            return redirect('/proyecto');
        }

        /*$asesor = Asesor::where('id',$proyecto->asesor_id)->first(); //registro que solo pertenezcan al usuario logueado (1 solo arreglo)

        $competencia = Competencia::where('id',$proyecto->competencia_id)->first();*/

        //dd($asesor);

        return view('proyecto/showProyecto',compact('proyecto')); //asesor es el usuario actual a mostrar
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        // Uso de gate
        if (!Gate::allows('gate-proyecto', $proyecto)) {
            return redirect('/proyecto');
        }

        $asesores = Asesor::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        $competencias = Competencia::where('tipo','Proyecto')->get();

        $categorias = Categoria::all();
        
        return view('proyecto/editProyecto',compact('proyecto', 'asesores', 'competencias','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        // Uso de gate
        if (!Gate::allows('gate-proyecto', $proyecto)) {
            return redirect('/proyecto');
        }

        Proyecto::where('id', $proyecto->id)->update($request->except('_token','_method','categoria_id')); //opuesto de except (only)

        // Insertar en la tabla pivote relacion m:n --> PENDIENTE FINAL
        //$proyecto->categorias()->attach($request->categoria_id); //detach() elimina de la lista el usuario que le pasemos

        //return redirect() -> route('categoria.show', $categoria); //esto corresponde a el listado de route:list 
        //return redirect() -> route('proyecto.index'); //esto corresponde a el listado de route:list 

        return redirect() -> route('proyecto.show', $proyecto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        // Uso de gate
        if (!Gate::allows('gate-proyecto', $proyecto)) {
            return redirect('/proyecto');
        }

        $proyecto -> delete();
        return redirect('/proyecto');
    }
}
