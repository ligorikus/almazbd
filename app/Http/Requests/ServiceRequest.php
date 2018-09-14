<?php

namespace App\Http\Requests;


class ServiceRequest extends Request
{
    public function rules() {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric|min:1'
        ];
    }
}