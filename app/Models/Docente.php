<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
    //'tipo' => 'required',
    'password' => 'required',
		'docTipoContrato' => 'required',
		'docAreaCurricular' => 'required',
		'insCodigoNit' => 'required',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      'password',
      'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
  
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','documentoIdentidad','email','tipo', 'password', 'docTipoContrato','docAreaCurricular','insCodigoNit'];



}
