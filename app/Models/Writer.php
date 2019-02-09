<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Writer
 * @package App\Models
 * @version February 9, 2019, 4:24 pm UTC
 *
 * @property string nombre
 * @property string genero
 * @property integer edad
 * @property string email
 */
class Writer extends Model
{
    use SoftDeletes;

    public $table = 'writers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'genero',
        'edad',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'genero' => 'string',
        'edad' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
