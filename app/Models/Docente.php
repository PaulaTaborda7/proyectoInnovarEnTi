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
 * @property $nombre
 * @property $documentoIdentidad
 * @property $email
 * @property $tipo
 * @property $password
 * @property $password_confirmation
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
		'nombre' => 'required',
		'documentoIdentidad' => 'required',
		'email' => 'required',
    'password' => 'required',
    'password_confirmation' => 'required',
		'docTipoContrato' => 'required',
		'docAreaCurricular' => 'required',
		'insCodigoNit' => 'required',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    //esta linea es para ocultar el password en la tabla
    protected $hidden = [
      'password',
      'password_confirmation',
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
    protected $fillable = ['nombre','documentoIdentidad','email','tipo', 'password', 'password_confirmation','docTipoContrato','docAreaCurricular','insCodigoNit'];



}
