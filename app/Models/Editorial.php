<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Editorial
 * @package App\Models
 * @version February 9, 2019, 4:33 pm UTC
 *
 * @property string nombre
 * @property string|\Carbon\Carbon fecha
 * @property string contacto
 */
class Editorial extends Model
{
    use SoftDeletes;

    public $table = 'editorials';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'fecha',
        'contacto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'contacto' => 'string'
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
