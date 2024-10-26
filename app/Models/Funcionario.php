<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Funcionario
 *
 * @property $id
 * @property $nombres
 * @property $carnet
 * @property $cargo
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Funcionario extends Model
{

  static $rules = [
    'nombres' => 'required|max:70',
    'carnet' => 'required|unique:funcionarios,carnet|max:15',
    'cargo' => 'required|max:50',
    'direccion' => 'required|max:100',
    'telefono' => 'required|max:12,telefono|regex:/^[0-9]{1,12}$/',
    'email' => 'required|max:30',
    'estado' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombres', 'carnet', 'cargo', 'direccion', 'telefono', 'email', 'users_id', 'estado', 'user_active'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user()
  {
    return $this->hasOne('App\Models\User', 'id', 'users_id'); // recibe a usuarios
  }
}
