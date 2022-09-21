<?php

namespace App\Models;

use App\Models\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property $created_at
 * @property $updated_at
 *
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Red extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function files(){
      return $this->hasMany(File::class);
    }
    
    static $rules = [
		'redNombre' => 'required',
		'redIdRed' => 'required',
		'redDescripcion' => 'required',
		'redTipoRecurso' => 'required',
		'idMateria' => 'required',
		//'redUrl' => 'required',
    ];

    // protected $perPage = 20;

    // /**
    //  * Attributes that should be mass-assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = ['redNombre','redIdRed','redDescripcion','redTipoRecurso','idMateria'];


    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function materia()
    // {
    //     return $this->hasOne('App\Models\Materia', 'matIdMateria', 'idMateria');
    // }
    

}
