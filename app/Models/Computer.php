<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = [
        'number', 'status'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}