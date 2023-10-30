<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Competencia;
use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all();

        $asesores = Asesor::all();

        return view('equipo/indexEquipo', compact('equipos','asesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asesores = Asesor::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        $competencias = Competencia::where('tipo','Equipo')->get();

        return view('equipo/createEquipo', compact('asesores','competencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]); //Inyectar el user id en el request

        Equipo::create($request->all());

        return redirect('/equipo'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        $asesor = Asesor::where('id',$equipo->asesor_id)->first(); //registro que solo pertenezcan al usuario logueado (1 solo arreglo)

        $competencia = Competencia::where('id',$equipo->competencia_id)->first();

        //dd($asesor);

        return view('equipo/showEquipo',compact('equipo', 'asesor', 'competencia')); //asesor es el usuario actual a mostrar
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        $asesores = Asesor::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        $competencias = Competencia::where('tipo','Equipo')->get();
        
        return view('equipo/editEquipo',compact('equipo', 'asesores', 'competencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {
        Equipo::where('id', $equipo->id)
                          ->update($request->except('_token','_method')); //opuesto de except (only)

        //return redirect() -> route('categoria.show', $categoria); //esto corresponde a el listado de route:list 
        return redirect() -> route('equipo.index'); //esto corresponde a el listado de route:list 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
