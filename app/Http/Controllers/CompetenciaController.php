<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Competencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() //proteger con inicio de sesion aquellas pestañas que yo quiera
     {
        $this->middleware('auth')->except(['index','show']); //excepto estas necesitan iniciar sesion 
     }
     
    //otra variante es "only" para autenticar solo aquellas que notros queramos 
    

    public function index()
    {
        $competencias = Competencia::all();

        return view('competencia/indexComepetencia', compact('competencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$asesores = Asesor::all();
        $asesores = Asesor::where('user_id',Auth::id())->get(); //registros que solo pertenezcan al usuario logueado

        return view('competencia/createCompetencia', compact('asesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([ ///Validar datos, si los datos recibidos no cumplen estas regresas no les permite la entrada a la base de datos y regresa a la pagina original
            'identificador' => ['required', 'string', 'min:3'],
            'fecha' => ['required', 'date', 'after_or_equal:today', 'before_or_equal:' . now()->addYears(2)->format('Y-m-d')],
            'duracion' => ['required','integer','min:1','max:100'],
            'asesor_id' => ['required', 'not_in:Selecciona una opción'],

        ]);

        $competencia = new Competencia();

        $competencia -> asesor_id = $request -> asesor_id;
        $competencia -> identificador = $request -> identificador;
        $competencia -> fecha = $request -> fecha;
        $competencia -> duracion = $request -> duracion;

        $competencia->save();

        return redirect()->route('competencia.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Competencia $competencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competencia $competencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competencia $competencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competencia $competencia)
    {
        //
    }
}
