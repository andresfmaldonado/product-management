<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ];
    }


}
