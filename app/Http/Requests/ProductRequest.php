<?php

namespace App\Http\Requests;

class ProductRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required',
            'reference' => 'required',
            'price' => 'required',
            'delivery_days'=>'required',
        ];
    }
}
