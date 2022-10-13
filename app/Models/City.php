<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    static $rules = [
		'id_municipio' => 'required',
		'name' => 'required',
        'estado' => 'required',
        'state_id' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_municipio','name','estado','state_id'];
}
