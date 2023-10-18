<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table = 'participantes'; 
    use HasFactory;
    protected $fillable = ['nombre','nombreEquipo','escuela','correo', 'numeroEquipo', 'pago', 'competencia'];
}
