<?php

namespace App\Repositories;

use App\Models\Post;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PostRepository
 * @package App\Repositories
 * @version February 9, 2019, 4:42 pm UTC
 *
 * @method Post findWithoutFail($id, $columns = ['*'])
 * @method Post find($id, $columns = ['*'])
 * @method Post first($columns = ['*'])
*/
class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'post_date',
        'email',
        'post_type',
        'category'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Post::class;
    }
}
