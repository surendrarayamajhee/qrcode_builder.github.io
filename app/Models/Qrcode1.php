<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Qrcode1
 * @package App\Models
 * @version July 23, 2021, 10:32 am UTC
 *
 * @property integer user_id
 * @property string brand_name
 * @property string product_name
 * @property string quantity
 * @property string qrcode_path
 * @property number amount
 * @property boolean status
 */
class Qrcode1 extends Model
{
    use SoftDeletes;

    public $table = 'qrcodes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'brand_name',
        'product_name',
        'quantity',
        'qrcode_path',
        'amount',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'brand_name' => 'string',
        'product_name' => 'string',
        'quantity' => 'string',
        'qrcode_path' => 'string',
        'amount' => 'float',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'brand_name' => 'required',
        'product_name' => 'required',
        'quantity' => 'required',
        'amount' => 'required',
        'status' => 'required'
    ];

    
}
