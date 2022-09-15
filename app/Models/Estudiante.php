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
    //'tipo' => 'required',
    'estPromedio' => 'required',
    'insCodigoNit' => 'required',
    'numIdentidadPadre' => 'required',
    'gruIdCurso' => 'required',
    'password' => 'required',
    'password_confirmation' => 'required|same:password',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'numIdentidad', 'email', 'tipo','estPromedio', 'insCodigoNit', 'numIdentidadPadre', 'gruIdCurso', 'password', 'password_confirmation'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function institucion()
  {
    return $this->hasOne('App\Models\Institucion', 'codigoNit', 'insCodigoNit');
  }
}
