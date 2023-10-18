<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $table = 'asesores'; //<-- Cambiar el nombre de mi tabla
    
    use HasFactory;
    protected $fillable = ['user_id','usuario','nombre','correo','telefono','escuela']; // <-- columnas llenables por el usuario (fillable) opuesto es guarded ES MEJOR ESTE
    //protected $guarded = ['id']; // <-- columnas protegidas no llenables por el usuario (guarded)

    // Definición de la relación con Usuario (PENDIENTE DE HACERLO FUNCIONAR) NO FUNCIONO LO ELIMINE
    public function competencias()
    {
        //return $this->belongsTo(Usuario::class);
        return $this->hasMany(Competencia::class);
    }

    public function user()
    {
        //return $this->belongsTo(Usuario::class);
        return $this->belongsTo(User::class);
    }

    public function organizaciones(){
        return $this -> belongsToMany(Organizacion::class);
    }
}
