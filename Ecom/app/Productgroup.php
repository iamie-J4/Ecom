<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productgroup extends Model
{
    protected $table = 'productgroups';



  const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
      'name',
      'category_id',
    ];



     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'name' => 'string',
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
    public function products(){
      return $this->hasMany('App\Models\Product');
    }

    public function subcategories(){
      return $this->hasMany('App\SubCategory');
    }
}
