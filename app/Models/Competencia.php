<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    //public $timestamps = false; //--> ignorar una valor de la tabla 

    // Definición de la relación con Usuario (PENDIENTE DE HACERLO FUNCIONAR) NO FUNCIONO LO ELIMINE
    public function asesor()
    {
        //return $this->belongsTo(Usuario::class);
        return $this->belongsTo(Asesor::class);
    }

}
