<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// * @property $matNombreMateria
// * @property $matDescripcion
// * @property $created_at
// * @property $updated_at
// *
// * @package App
// * @mixin \Illuminate\Database\Eloquent\Builder
// *

class Red_grupo extends Model
{
    
    static $rules = [
        'habilitado' => 'required',
		'gruIdGrupo' => 'required',
		'redIdRed' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['habilitado','gruIdGrupo','redIdRed'];
}
