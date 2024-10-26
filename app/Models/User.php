<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $name_bd
 * @property $id_login
 * @property $email
 * @property $password
 * @property $estado
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa[] $empresas
 * @property Formulario[] $formularios
 * @property Funcionario[] $funcionarios
 * @property Metalico[] $metalicos
 * @property Minero[] $mineros
 * @property Municipio[] $municipios
 * @property Nometalico[] $nometalicos
 * @property Ubicacion[] $ubicacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;


    static $rules = [
        'name' => 'required',
        'name_bd' => 'required',
        'id_login' => 'required',
        'email' => 'required',
        'password' => 'required',
        'estado' => 'required',
        'rol' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'name_bd', 'id_login', 'email', 'password', 'estado', 'rol'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empresas()
    {
        return $this->hasMany('App\Models\Empresa', 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formularios()
    {
        return $this->hasMany('App\Models\Formulario', 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function funcionarios()
    {
        return $this->hasMany('App\Models\Funcionario', 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metalicos()
    {
        return $this->hasMany('App\Models\Metalico', 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mineros()
    {
        return $this->hasMany('App\Models\Minero', 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function municipios()
    {
        return $this->hasMany('App\Models\Municipio', 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nometalicos()
    {
        return $this->hasMany('App\Models\Nometalico', 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ubicacions()
    {
        return $this->hasMany('App\Models\Ubicacion', 'users_id', 'id');
    }


    // relacion de muchos a uno inversa(muchos a uno)
    public function rol()
    {
        return $this->belongsTo('App\Models\Role', 'roles_id'); // Recibe a Rol
    }
}
