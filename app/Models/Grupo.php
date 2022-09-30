<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 *
 * @property $id
 * @property $gruNombre
 * @property $gruIdGrupo
 * @property $gruJornada
 * @property $gruCantEstudiante
 * @property $gruCantMateria
 * @property $insCodigoNit
 * @property $created_at
 * @property $updated_at
 *
 * @property Institucion $institucion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grupo extends Model
{
    static $rules = [
        'gruNombre' => 'required',
		'gruIdGrupo' => 'required',
		'gruJornada' => 'required',
		'gruCantEstudiante' => 'required',
		'gruCantMateria' => 'required',
		'insCodigoNit' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['gruNombre', 'gruIdGrupo','gruJornada','gruCantEstudiante','gruCantMateria','insCodigoNit'];

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function institucion()
    {
        return $this->hasOne('App\Models\Institucion', 'codigoNit', 'insCodigoNit');
    }
    

}
