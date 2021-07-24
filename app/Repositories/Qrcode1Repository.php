<?php

namespace App\Repositories;

use App\Models\Qrcode1;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Qrcode1Repository
 * @package App\Repositories
 * @version July 23, 2021, 10:32 am UTC
 *
 * @method Qrcode1 findWithoutFail($id, $columns = ['*'])
 * @method Qrcode1 find($id, $columns = ['*'])
 * @method Qrcode1 first($columns = ['*'])
*/
class Qrcode1Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'brand_name',
        'product_name',
        'quantity',
        'qrcode_path',
        'amount',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Qrcode1::class;
    }
}
