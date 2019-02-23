<?php

namespace App\Repositories;

use App\Models\Tarea;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TareaRepository
 * @package App\Repositories
 * @version February 16, 2019, 9:30 pm UTC
 *
 * @method Tarea findWithoutFail($id, $columns = ['*'])
 * @method Tarea find($id, $columns = ['*'])
 * @method Tarea first($columns = ['*'])
*/
class TareaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'category'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tarea::class;
    }
}
