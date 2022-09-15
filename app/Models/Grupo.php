<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 *
 * @property $id
 * @property $gruIdGrupo
 * @property $gruNombre
 * @property $gruJornada
 * @property $gruCantEstudiante
 * @property $gruCantMateria
 * @property $insCodigoNit
 * @property $numIdentidadDocente
 * @property $created_at
 * @property $updated_at
 *
 * @property Docente $docente
 * @property Institucion $institucion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grupo extends Model
{
    
    static $rules = [
		'gruIdGrupo' => 'required',
		'gruNombre' => 'required',
		'gruJornada' => 'required',
		'gruCantEstudiante' => 'required',
		'gruCantMateria' => 'required',
		'insCodigoNit' => 'required',
		'numIdentidadDocente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['gruIdGrupo','gruNombre','gruJornada','gruCantEstudiante','gruCantMateria','insCodigoNit','numIdentidadDocente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'documentoIdentidad', 'numIdentidadDocente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function institucion()
    {
        return $this->hasOne('App\Models\Institucion', 'codigoNit', 'insCodigoNit');
    }
    

}
