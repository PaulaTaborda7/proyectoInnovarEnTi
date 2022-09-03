<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 *
 * @property $id
 * @property $name
 * @property $documentoIdentidad
 * @property $email
 * @property $tipo
 * @property $password
 * @property $docTipoContrato
 * @property $docAreaCurricular
 * @property $insCodigoNit
 * @property $email_verified_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Docente extends Model
{
    
    static $rules = [
		'name' => 'required',
		'documentoIdentidad' => 'required',
		'email' => 'required',
    'tipo' => 'required',
    'password' => 'required',
		'docTipoContrato' => 'required',
		'docAreaCurricular' => 'required',
		'insCodigoNit' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','documentoIdentidad','email','tipo', 'password', 'docTipoContrato','docAreaCurricular','insCodigoNit'];



}
