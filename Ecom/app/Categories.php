<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $fillable = [
      'name',
      'image',
    ];

    public function products(){
      return $this->hasMany('App\Models\Product');
    }

    public function subCategories(){
      return $this->hasMany('App\SubCategory');
    }

}
