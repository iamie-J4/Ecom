<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
   protected $table = 'categories';
  
   const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
      'name',
      'image',
    ];


     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public static function kategories(){
        return static::all();
    }


    public function products(){
      return $this->hasMany('App\Models\Product');
    }
    
    public function productgroups(){
      return $this->hasMany('App\Productgroup');
    }

    public function subCategories(){
      return $this->hasMany('App\SubCategory');
    }
    

}
