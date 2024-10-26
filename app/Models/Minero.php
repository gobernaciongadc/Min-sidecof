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
 * @property $users_id
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
  protected $fillable = ['rocmin', 'nombres', 'fecha_inscripcion', 'procedencia', 'telefono', 'estado', 'users_id', 'user_active', 'longitud', 'latitud', 'archivo_pdf'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user()
  {
    return $this->hasOne('App\Models\User', 'id', 'users_id');
  }
}
