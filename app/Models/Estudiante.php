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
 * @property $password
 * @property $estPromedio
 * @property $insCodigoNit
 * @property $numIdentidadPadre
 * @property $gruIdCurso
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
    'password' => 'required',
    'estPromedio' => 'required',
    'insCodigoNit' => 'required',
    'numIdentidadPadre' => 'required',
    'gruIdCurso' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'numIdentidad', 'email', 'tipo', 'password', 'estPromedio', 'insCodigoNit', 'numIdentidadPadre', 'gruIdCurso'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function institucion()
  {
    return $this->hasOne('App\Models\Institucion', 'codigoNit', 'insCodigoNit');
  }
}
