<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ID Usuario
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:only-admin');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrador/createAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$user = $this->create($request->all());
        //$request->merge(['tipo' => 1]); //Inyectar el user id en el request
        
        //Tabla pivote
        //$asesor = Asesor::create($request->only('id'));

        //dd($request->organizacion_id); //PRUEBA DD

        //User::create($request->all()); // <-- hace todo lo que esta abajo desde new hasta save


        $user = User::create([
                'tipo' => 2,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),                
            ])
            /*, function (User $user) {
                $this->createTeam($user);
            }*/;

        $user->sendEmailVerificationNotification();

    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
