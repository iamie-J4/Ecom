<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class UpdateProductRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        // 'image'=> 'string|max:250',
            'name' => 'required|string|max:250',
            'description' => 'string|max:250',
            'price' => 'required|integer',
            'qty' => 'required|integer',
            'o_qty' => 'required|integer',
            //'source' => 'string|max:250',
            'category_id' => 'required|integer',
            // 'subCategory_id' => 'required|integer',
            // 'postage' => 'string|max:250',
            // 'status' => 'string|max:250',
    ];
    }
}
