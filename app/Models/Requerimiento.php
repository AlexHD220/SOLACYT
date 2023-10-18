<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;
    public function requerimiento()
    {
        //return $this->belongsTo(Usuario::class);
        return $this->belongsTo(Requerimiento::class);
    }

}
