<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    //
    protected $fillable = [
      'name',
      'category_id',
    ];

    public function products(){
      return $this->hasMany('App\Models\Product');
    }

    public function subCategories(){
      return $this->belongsTo('App\Category');
    }
}
