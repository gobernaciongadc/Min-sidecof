<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $tipo_metalico
 * @property $tipo_no_metalico
 * @property $nombres
 * @property $ruim
 
 * @property $nro_nit
 * @property $nro_nim
 * @property $fecha_caducidad
 * @property $longitud
 * @property $latitud
  
 * @property $n_municipios
 * @property $fecha_inscripcion
 * @property $archivo_pdf
 * @property $estado
 * @property $users_id
 * 
 * @property $representante_legar
 * @property $carnet
 * @property $celular
 * @property $patente
 * 
 * 
 * 
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{

  static $rules = [

    'nombres' => 'required|max:200',
    'ruim' => 'required|unique:empresas,ruim|max:15',
    'mineral' => 'required',

    'nro_nit' => 'required',
    'nro_nim' => 'required',
    'fecha_caducidad' => 'required',
    'longitud' => 'required',
    'latitud' => 'required',

    'representante_legal' => 'required',
    'carnet' => 'required',
    'celular' => 'required',
    'patente' => 'required',

    'n_municipios' => 'required',
    'fecha_inscripcion' => 'required',
    'archivo_pdf' => 'nullable|mimes:pdf', // PDF y tamaño máximo de 30 MB 
    'estado' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['tipo_metalico', 'tipo_no_metalico', 'nombres', 'ruim', 'mineral', 'n_municipios', 'fecha_inscripcion', 'estado', 'users_id', 'user_active', 'nro_nit', 'nro_nim', 'fecha_caducidad', 'longitud', 'latitud', 'archivo_pdf', 'representante_legal', 'carnet', 'celular', 'patente'];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user()
  {
    return $this->hasOne('App\Models\User', 'id', 'users_id'); // Recibe a usuarios
  }
}
