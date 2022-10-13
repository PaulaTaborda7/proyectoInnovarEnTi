<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Institucion
 *
 * @property $id
 * @property $insNombre
 * @property $codigoNit
 * @property $insDireccion
 * @property $insDepartamento
 * @property $insPais
 * @property $insCiudad
 * @property $insTelefono
 * @property $insCalendario
 * @property $insCantidadDocentes
 * @property $insCantidadEstudiantes
 * @property $tipoPaquete
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Institucion extends Model
{
    
    static $rules = [
		'insNombre' => 'required',
		'codigoNit' => 'required',
		'insDireccion' => 'required',
		'insDepartamento' => 'required',
		'insPais' => 'required',
		'insCiudad' => 'required',
		'insTelefono' => 'required',
		'insCalendario' => 'required',
		'insCantidadDocentes' => 'required',
		'insCantidadEstudiantes' => 'required',
		'tipoPaquete' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['insNombre','codigoNit','insDireccion','insDepartamento','insPais','insCiudad','insTelefono','insCalendario','insCantidadDocentes','insCantidadEstudiantes','tipoPaquete'];



}
