<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version July 11, 2018, 8:00 am UTC
 *
 * @property string user_id
 * @property string name
 * @property string description
 * @property decimal price
 * @property integer qty
 * @property integer o_qty
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
        'qty',
        'o_qty',
        'source',
        'image',
        'category_id',
        'productgroup_id',
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
        'qty' => 'integer',
        'o_qty' => 'integer',
        'source' => 'string',
        'image' => 'string',
        'category_id' => 'integer',
        'productgroup_id' => 'integer',
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

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function subcategory(){
      return $this->belongsTo('App\SubCategory');
    }

    public function productgroup(){
      return $this->belongsTo('App\Productgroup');
    }

     public function user(){
      return $this->belongsTo('App\User');
    }

    
}
