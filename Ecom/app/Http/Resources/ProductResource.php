<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'category' => $this->category->name,
            'productgroup' => $this->productgroup->name,
            'qty' => $this->qty,
        ];
    }

    public function with($request){
        return [
            'Admin' => 'Ayamie',
            'version' => '1.0',
        ];
    }
}
