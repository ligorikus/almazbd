<?php

namespace App\Http\Requests;


class OrderRequest extends Request
{
    public function rules() {
        return [
            'admin' => 'required|numeric',
            'computer' => 'required|numeric',
            'services' => 'required|array',
            'count' => 'required|array'
        ];
    }
}