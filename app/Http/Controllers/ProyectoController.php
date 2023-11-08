<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Competencia;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProyectoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:only-user')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Uso de gate
        if (Gate::allows('only-user')) {
            $proyectos = Proyecto::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado
        }
        else{
            $proyectos = Proyecto::all();
        }

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

        return view('proyecto/createProyecto', compact('asesores','competencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]); //Inyectar el user id en el request

        Proyecto::create($request->all());

        return redirect('/proyecto'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        $asesor = Asesor::where('id',$proyecto->asesor_id)->first(); //registro que solo pertenezcan al usuario logueado (1 solo arreglo)

        $competencia = Competencia::where('id',$proyecto->competencia_id)->first();

        //dd($asesor);

        return view('proyecto/showProyecto',compact('proyecto', 'asesor', 'competencia')); //asesor es el usuario actual a mostrar
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $asesores = Asesor::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        $competencias = Competencia::where('tipo','Proyecto')->get();
        
        return view('proyecto/editProyecto',compact('proyecto', 'asesores', 'competencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        Proyecto::where('id', $proyecto->id)
                          ->update($request->except('_token','_method')); //opuesto de except (only)

        //return redirect() -> route('categoria.show', $categoria); //esto corresponde a el listado de route:list 
        return redirect() -> route('proyecto.index'); //esto corresponde a el listado de route:list 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
