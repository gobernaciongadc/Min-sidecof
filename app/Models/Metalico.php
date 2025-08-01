<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Metalico
 *
 * @property $id
 * @property $nombre
 * @property $simbolo
 * @property $alicuota
 * @property $tipo_mercado
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Metalico extends Model
{

  static $rules = [
    'nombre' => 'required|max:15',
    'simbolo' => 'required|max:5',
    'alicuota' => 'required',
    'tipo_mercado' => 'required',
    'estado' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'simbolo', 'users_id', 'estado', 'alicuota', 'tipo_mercado'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user()
  {
    return $this->hasOne('App\Models\User', 'id', 'users_id');
  }
}
