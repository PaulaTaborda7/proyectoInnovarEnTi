<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Red
 *
 * @property $id
 * @property $redNombre
 * @property $redIdRed
 * @property $redDescripcion
 * @property $redTipoRecurso
 * @property $idMateria
 * @property $redUrl
 * @property $created_at
 * @property $updated_at
 *
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Red extends Model
{
    
    static $rules = [
		'redNombre' => 'required',
		'redIdRed' => 'required',
		'redDescripcion' => 'required',
		'redTipoRecurso' => 'required',
		'idMateria' => 'required',
		'redUrl' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['redNombre','redIdRed','redDescripcion','redTipoRecurso','idMateria','redUrl'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'matIdMateria', 'idMateria');
    }
    

}
