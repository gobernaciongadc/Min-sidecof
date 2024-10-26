<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 *
 * @property $id
 * @property $codigo
 * @property $municipio
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{

  static $rules = [
    'codigo' => 'required|unique:municipios,codigo|max:10',
    'municipio' => 'required|max:20',
    'estado' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['codigo', 'municipio', 'users_id', 'estado'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */

  public function user()
  {
    return $this->hasOne('App\Models\User', 'id', 'users_id'); // recibe a usuarios
  }
}
