<?php

namespace App\Http\Requests;


class ComputerRequest extends Request
{
    public function rules() {
        return [
            'number' => 'required|string',
            'status' => 'nullable'
        ];
    }
}