<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Institucion
 *
 * @property $id
 * @property $codigoNit
 * @property $insDireccion
 * @property $insDepartamento
 * @property $insPais
 * @property $insTelefono
 * @property $insCalendario
 * @property $insCantidadDocentes
 * @property $insCantidadEstudiantes
 * @property $completo
 * @property $dea
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Institucion extends Model
{
    
    static $rules = [
		'codigoNit' => 'required',
		'insDireccion' => 'required',
		'insDepartamento' => 'required',
		'insPais' => 'required',
		'insTelefono' => 'required',
		'insCalendario' => 'required',
		'insCantidadDocentes' => 'required',
		'insCantidadEstudiantes' => 'required',
		'completo' => 'required',
		'dea' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigoNit','insDireccion','insDepartamento','insPais','insTelefono','insCalendario','insCantidadDocentes','insCantidadEstudiantes','completo','dea'];



}
