<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() //proteger con inicio de sesion aquellas pestañas que yo quiera
     {
        $this->middleware('auth')->except(['index','show']); //excepto estas necesitan iniciar sesion 
     }
    
    public function index()
    {
        //return "hola index";
        //return view('participante/indexParticipante');
        $participantes = Participante::all();
        return view('participante/indexParticipante', compact('participantes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('participante/createParticipante');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([                                        //validacion

            'nombre'=>'required',
            'nombreEquipo'=>'required',
            'escuela'=>'required',
            'correo'=>'required',
            'numeroEquipo'=>'required',
            'pago'=>'required',
            'competencia'=>'required'
        ]);

        Participante::create($request->all());

       /* $participante = new Participante();
        $participante->nombre = $request->nombre;
        $participante->nombreEquipo = $request->nombreEquipo;
        $participante->escuela = $request->escuela;
        $participante->correo = $request->correo;
        $participante->numeroEquipo = $request->numeroEquipo;
        $participante->pago = $request->pago;
        $participante->competencia = $request->competencia;

        $participante->save();*/

        return redirect('/participante');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participante $participante)
    {
        //$participante = Participante::find
        return view('participante/showParticipante', compact('participante'));
        //return view('asesor.showAsesor',compact('asesor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participante $participante)
    {
        return view('participante/editParticipante', compact('participante'));
        //return view('participante.editParticipante', compact('participante'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participante $participante)
    {

       /* $request->validate([                                        //validacion

            'nombre'=>'required',
            'nombreEquipo'=>'required',
            'escuela'=>'required',
            'correo'=>'required',
            'numeroEquipo'=>'required',
            'pago'=>'required',
            'competencia'=>'required'
        ]);

        $participante->nombre = $request->nombre;
        $participante->nombreEquipo = $request->nombreEquipo;
        $participante->escuela = $request->escuela;
        $participante->correo = $request->correo;
        $participante->numeroEquipo = $request->numeroEquipo;
        $participante->pago = $request->pago;
        $participante->competencia = $request->competencia;
        $participante->save();
        return redirect()->route('participante.index');*/


        Participante::where('id', $participante->id)
                ->update($request->except('_token','_method')); //opuesto de except (only)

        return redirect() -> route('participante.show', $participante);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participante $participante)
    {
        $participante->delete();
        return redirect()->route('participante.index');
        //return redirect()->route('participante.index');

    }
}
