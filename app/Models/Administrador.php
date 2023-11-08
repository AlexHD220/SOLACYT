<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\TwoFactorAuthenticatable;

class Administrador extends Model
{
    protected $table = 'administradores'; //<-- Cambiar el nombre de mi tabla

    use HasFactory;
    use TwoFactorAuthenticatable;

    public $timestamps = false; //--> ignorar una valor de la tabla 

    protected $fillable = [
        'name', 'email', 'password', 'tipo'
    ];



    public function user()
    {
        //return $this->belongsTo(Usuario::class);
        return $this->belongsTo(User::class);
    }
}
