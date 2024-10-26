<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    // 1.- indicamos la tabla que va a utilizar de la base de datos
    protected $table = 'ubicacions';


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id'); // recibe a users
    }

    public function ubicacion()
    {
        return $this->hasOne('App\Models\Ubicacion', 'id', 'formularios_id'); // recibe a ubicacion
    }
}
