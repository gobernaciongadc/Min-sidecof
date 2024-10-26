<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numeracion extends Model
{

    use HasFactory;
    // 1.- indicamos la tabla que va a utilizar de la base de datos
    protected $table = 'numeracions';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formulario()
    {
        return $this->hasOne('App\Models\Formulario', 'id', 'formularios_id'); // recibe a formularios

    }
}
