<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Formulario
 *
 * @property $id
 * @property $nro_formulario
 * @property $razon_social
 * @property $nro_ruim
 * @property $nro_nit
 * @property $ruim
 * @property $reg_partida
 * @property $tipo_min_metalico
 * @property $presentacion
 * @property $nro_lote
 * @property $tipo_min_nometalico
 * @property $cert_analisis_quimico
 * @property $unidad
 * @property $peso_bruto_kg
 * @property $peso_neto_kg
 * @property $tara_kg
 * @property $hum_merma
 * @property $merma
 * @property $humedad
 * @property $municipio
 * @property $origen_destino_comercializadora
 * @property $alicuota
 * @property $aduana
 * @property $comprador
 * @property $transporte
 * @property $declarcion_jurada
 * @property $fecha_emision
 * @property $fecha_valides
 * @property $observaciones
 * @property $senarecom
 * @property $comercio
 * @property $ley
 * @property $estado
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Formulario extends Model
{
	static $rules = [
		'nro_formulario' => 'nullable|regex:/^[0-9]+$/|unique:formularios,nro_formulario',
		'razon_social' => 'required|max:50',
		'nro_nim' => 'required|max:15',
		'nro_nit' => 'required|max:15',
		'ruim' => 'required|max:15',

		'reg_partida' => 'nullable|max:15',

		// 'tipo_min_metalico' => 'required',
		// 'nro_lote' => 'required',
		'nro_lote' => 'nullable|max:15',
		// 'tipo_min_nometalico' => 'required',

		'cert_analisis_quimico' => 'nullable|max:15',

		'peso_bruto_kg' => 'nullable|max:10',
		'peso_neto_kg' => 'nullable|max:10',
		'tara_kg' => 'nullable|max:10',
		'hum_merma' => 'nullable|max:10',

		'codigo' => 'required',

		'municipio' => 'required',

		'origen' => 'required|max:13',
		'destino' => 'required|max:13',

		'comercializadora' => 'required|max:16',

		'alicuota' => 'required|max:30',
		'transporte' => 'required',
		'chofer' => 'required|max:20',
		'placa' => 'required|max:15',
		// 'declarcion_jurada' => 'required',
		'fecha_emision' => 'required',
		'fecha_valides' => 'required',
		'observaciones' => 'nullable|max:115',
		'comercio' => 'required',
		'unidad' => 'required',
		// 'estado' => 'required',
		// 'users_id' => 'required',
	];

	static $rules_externo = [
		'nro_formulario' => 'nullable|regex:/^[0-9]+$/|unique:formularios,nro_formulario',
		'razon_social' => 'required|max:50',
		'nro_nim' => 'required|max:15',
		'nro_nit' => 'required|max:15',
		'ruim' => 'required|max:15',


		// 'tipo_min_metalico' => 'required',
		// 'tipo_min_nometalico' => 'required',


		// comercio externo
		// 'reg_partida' => 'required|max:15',
		'nro_lote' => 'required|max:15',
		// 'cert_analisis_quimico' => 'required|max:15',
		'peso_bruto_kg' => 'required|max:10',
		'peso_neto_kg' => 'required|max:10',
		'tara_kg' => 'required|max:10',
		// 'hum_merma' => 'required|max:10',
		// FIN comercio externo

		'codigo' => 'required',

		'municipio' => 'required',

		'origen' => 'required|max:13',
		'destino' => 'required|max:13',

		// 'comercializadora' => 'required|max:16',

		'alicuota' => 'required|max:30',
		'transporte' => 'required',
		'chofer' => 'required|max:20',
		'placa' => 'required|max:15',
		// 'declarcion_jurada' => 'required',
		'fecha_emision' => 'required',
		'fecha_valides' => 'nullable',
		'observaciones' => 'nullable|max:115',
		'comercio' => 'required',
		'unidad' => 'required',
		// 'estado' => 'required',
		// 'users_id' => 'required',
	];

	static $rules_edit = [
		'nro_formulario' => 'nullable|regex:/^[0-9]+$/|unique:formularios,nro_formulario',
		'razon_social' => 'required|max:50',
		'nro_nim' => 'required|max:15',
		'nro_nit' => 'required|max:15',
		'ruim' => 'required|max:15',


		// 'tipo_min_metalico' => 'required',
		// 'tipo_min_nometalico' => 'required',


		// comercio externo
		// 'reg_partida' => 'required|max:15',
		'nro_lote' => 'required|max:15',
		// 'cert_analisis_quimico' => 'required|max:15',
		'peso_bruto_kg' => 'required|max:10',
		'peso_neto_kg' => 'required|max:10',
		'tara_kg' => 'required|max:10',
		// 'hum_merma' => 'required|max:10',
		// FIN comercio externo

		'codigo' => 'required',

		'municipio' => 'required',

		'origen' => 'required|max:13',
		'destino' => 'required|max:13',

		// 'comercializadora' => 'required|max:16',

		'alicuota' => 'required|max:30',
		'transporte' => 'required',
		'chofer' => 'required|max:20',
		'placa' => 'required|max:15',
		// 'declarcion_jurada' => 'required',
		'fecha_emision' => 'required',
		'fecha_valides' => 'nullable',
		'observaciones' => 'nullable|max:115',
		'comercio' => 'nullable',
		'unidad' => 'required',
		// 'estado' => 'required',
		// 'users_id' => 'required',
	];

	static $rules_create = [
		'nro_formulario' => 'nullable|regex:/^[0-9]+$/|unique:formularios,nro_formulario',
		'razon_social' => 'required|max:50',
		'nro_nim' => 'required|max:15',
		'nro_nit' => 'required|max:15',
		'ruim' => 'required|max:15',

		'reg_partida' => 'nullable|max:15',

		// 'tipo_min_metalico' => 'required',
		// 'nro_lote' => 'required',
		'nro_lote' => 'nullable|max:15',
		// 'tipo_min_nometalico' => 'required',

		'cert_analisis_quimico' => 'nullable|max:15',

		'peso_bruto_kg' => 'nullable|max:10',
		'peso_neto_kg' => 'nullable|max:10',
		'tara_kg' => 'nullable|max:10',
		'hum_merma' => 'nullable|max:10',

		'codigo' => 'required',

		'municipio' => 'required',

		'origen' => 'required|max:13',
		'destino' => 'required|max:13',

		'comercializadora' => 'required|max:16',

		'alicuota' => 'required|max:30',
		'transporte' => 'required',
		'chofer' => 'required|max:20',
		'placa' => 'required|max:15',
		// 'declarcion_jurada' => 'required',
		'fecha_emision' => 'required',
		'fecha_valides' => 'required',
		'observaciones' => 'nullable|max:115',
		'comercio' => 'nullable',
		'unidad' => 'required',
		// 'estado' => 'required',
		// 'users_id' => 'required',
	];


	protected $perPage = 20;

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nro_formulario',
		'razon_social',
		'nro_nim',
		'nro_nit',
		'ruim',
		'reg_partida',
		'tipo_min_metalico',
		'nro_lote',
		'presentacion',
		'tipo_min_nometalico',
		'cert_analisis_quimico',
		'unidad',
		'peso_bruto_kg',
		'peso_neto_kg',
		'tara_kg',
		'hum_merma',
		'humedad',
		'merma',
		'codigo',
		'municipio',
		'origen',
		'destino',
		'comercializadora',
		'aduana',
		'comprador',
		'alicuota',
		'transporte',
		'chofer',
		'placa',
		'declarcion_jurada',
		'fecha_emision',
		'fecha_valides',
		'observaciones',
		'senarecom',
		'comercio',
		'ley',
		'estado',
		'staging'
	];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function user()
	{
		return $this->hasOne('App\Models\User', 'id', 'users_id'); // recibe
	}
}
