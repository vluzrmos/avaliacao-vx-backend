<?php

namespace App\Http\Requests;

use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Carbon;

class SaleRequest extends Request
{
    public function rules()
    {
        if ($this->isMethod('PUT')) {
            return [
                'purchase_at' => 'required|date'
            ];
        }

        return [
            'purchase_at' => 'required|date|before:tomorrow',
            'delivery_days' => 'required',
            'amount' => 'required',
            'products'=> 'required|array',
        ];
    }
}
