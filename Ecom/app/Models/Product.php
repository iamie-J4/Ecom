<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version July 5, 2018, 5:18 am UTC
 *
 * @property string user_id
 * @property string name
 * @property string description
 * @property decimal price
 * @property string source
 * @property string image
 * @property string category
 * @property string postage
 * @property string status
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'source',
        'image',
        'category',
        'postage',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'source' => 'string',
        'image' => 'string',
        'category' => 'string',
        'postage' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
