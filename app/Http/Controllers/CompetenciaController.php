<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Competencia;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $asesores = Asesor::all();
        return view('competencia/createCompetencia', compact('asesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competencia = new Competencia();

        $competencia -> asesor_id = $request -> asesor_id;
        $competencia -> identificador = $request -> identificador;
        $competencia -> fecha = $request -> fecha;
        $competencia->save();

        return redirect()->route('asesor.index');

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
