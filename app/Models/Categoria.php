<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nombre','descripcion']; // <-- columnas llenables por el usuario (fillable) opuesto es guarded ES MEJOR ESTE

    public function competencias(){
        return $this -> belongsToMany(Competencia::class); //Pertenece a muchos
    }
}
