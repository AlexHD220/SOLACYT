<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $table = 'asesores'; //<-- Cambiar el nombre de mi tabla
    use HasFactory;

    // Definición de la relación con Usuario (PENDIENTE DE HACERLO FUNCIONAR) NO FUNCIONO LO ELIMINE
    /*public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }*/
}
