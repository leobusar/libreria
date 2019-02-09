<?php

namespace App\Repositories;

use App\Models\Writer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WriterRepository
 * @package App\Repositories
 * @version February 9, 2019, 4:24 pm UTC
 *
 * @method Writer findWithoutFail($id, $columns = ['*'])
 * @method Writer find($id, $columns = ['*'])
 * @method Writer first($columns = ['*'])
*/
class WriterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'genero',
        'edad',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Writer::class;
    }
}
