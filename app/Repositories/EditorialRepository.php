<?php

namespace App\Repositories;

use App\Models\Editorial;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EditorialRepository
 * @package App\Repositories
 * @version February 9, 2019, 4:33 pm UTC
 *
 * @method Editorial findWithoutFail($id, $columns = ['*'])
 * @method Editorial find($id, $columns = ['*'])
 * @method Editorial first($columns = ['*'])
*/
class EditorialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'fecha',
        'contacto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Editorial::class;
    }
}
