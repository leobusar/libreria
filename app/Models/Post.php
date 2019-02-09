<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version February 9, 2019, 4:42 pm UTC
 *
 * @property \App\Models\Writer writer
 * @property \Illuminate\Database\Eloquent\Collection Comment
 * @property \Illuminate\Database\Eloquent\Collection userRoles
 * @property string title
 * @property dateTime post_date
 * @property string body
 * @property string email
 * @property integer author_gender
 * @property string post_type
 * @property integer post_visits
 * @property string category
 * @property string category_short
 * @property integer writer_id
 */
class Post extends Model
{
    use SoftDeletes;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'post_date',
        'body',
        'email',
        'author_gender',
        'post_type',
        'post_visits',
        'category',
        'category_short',
        'writer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'post_date' => 'datetime',
        'body' => 'string',
        'email' => 'string',
        'author_gender' => 'integer',
        'post_type' => 'string',
        'post_visits' => 'integer',
        'category' => 'string',
        'category_short' => 'string',
        'is_private' => 'boolean',
        'writer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function writer()
    {
        return $this->belongsTo(\App\Models\Writer::class, 'writer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'user_roles', 'user_id', 'role_id');
    }
}
