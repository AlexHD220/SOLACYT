<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Requerimiento;
use Illuminate\Http\Request;

class RequerimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requerimientos = Requerimiento::all();

        return view('requerimiento/indexRequerimiento', compact('requerimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $participantes = Participante::all();
        return view('requerimiento/createRequerimiento', compact('requerimientos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requerimiento = new Requerimiento();

        $requerimiento -> asesor_id = $request -> asesor_id;
        $requerimiento -> identificador = $request -> identificador;
        $requerimiento -> fecha = $request -> fecha;
        $requerimiento->save();

        return redirect()->route('asesor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requerimiento $requerimiento)
    {
        //
    }
}
