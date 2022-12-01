<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 *
 * @property $id
 * @property $nombre
 * @property $numIdentidad
 * @property $email
 * @property $tipo
 * @property $estPromedio
 * @property $insCodigoNit
 * @property $numIdentidadPadre
 * @property $gruIdCurso
 * @property $observacion
 * @property $password
 * @property $password_confirmation
 * @property $created_at
 * @property $updated_at
 *
 * @property Institucion $institucion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudiante extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'numIdentidad' => 'required',
		'email' => 'required',
		'estPromedio' => 'required',
		'insCodigoNit' => 'required',
		'numIdentidadPadre' => 'required',
		'gruIdCurso' => 'required',
    'observacion' => 'required',
    'password' => 'required',
		'password_confirmation' => 'required',
    ];


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
    protected $fillable = ['nombre','numIdentidad','email','tipo','estPromedio','insCodigoNit','numIdentidadPadre','gruIdCurso','observacion','password','password_confirmation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function institucion()
    {
        return $this->hasOne('App\Models\Institucion', 'codigoNit', 'insCodigoNit');
    }
    

}
