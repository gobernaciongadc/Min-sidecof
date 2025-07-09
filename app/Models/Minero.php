<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Minero
 *
 * @property $id
 * @property $nombre_completo
 * @property $nro_registro
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $tipo_operacion
 * @property $lugar_operacion
 * @property $estado
 * @property $nro_nit
 * @property $nro_nim
 * @property $fecha_caducidad
 * @property $users_id
 * @property $representante_legar
 * @property $carnet
 * @property $celular
 * @property $longitud
 * @property $latitud
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Minero extends Model
{

  static $rules = [
    'rocmin' => 'required|unique:mineros,rocmin|max:15',
    'nombres' => 'required|max:70',
    'fecha_inscripcion' => 'required',
    'procedencia' => 'required|max:300',
    'telefono' => 'required|max:12,telefono|regex:/^[0-9]{1,12}$/',
    'estado' => 'required',
    'nro_nit' => 'required',
    'nro_nim' => 'required',
    'fecha_caducidad' => 'required',
    'representante_legal' => 'required',
    'carnet' => 'required',
    'celular' => 'required',
    'longitud' => 'required',
    'latitud' => 'required',
    'archivo_pdf' => 'nullable|mimes:pdf', // PDF y tamaño máximo de 30 MB 
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = [
    'rocmin',
    'nombres',
    'fecha_inscripcion',
    'procedencia',
    'telefono',
    'estado',
    'nro_nit',
    'nro_nim',
    'fecha_caducidad',
    'users_id',
    'user_active',
    'longitud',
    'latitud',
    'archivo_pdf',
    'representante_legal',
    'carnet',
    'celular'
  ];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user()
  {
    return $this->hasOne('App\Models\User', 'id', 'users_id');
  }
}
