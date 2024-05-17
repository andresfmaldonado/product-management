<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'price' => 'required|float',
            'stock' => 'required|integer',
        ];
    }


}
