<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tarea
 * @package App\Models
 * @version February 16, 2019, 9:30 pm UTC
 *
 * @property string.25 name
 * @property string.25 category
 */
class Tarea extends Model
{
    use SoftDeletes;

    public $table = 'tareas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
