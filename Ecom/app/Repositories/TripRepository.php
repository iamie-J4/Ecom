<?php

namespace App\Repositories;

use App\Models\Trip;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TripRepository
 * @package App\Repositories
 * @version July 5, 2018, 5:19 am UTC
 *
 * @method Trip findWithoutFail($id, $columns = ['*'])
 * @method Trip find($id, $columns = ['*'])
 * @method Trip first($columns = ['*'])
*/
class TripRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'departure',
        'arrival'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Trip::class;
    }
}
