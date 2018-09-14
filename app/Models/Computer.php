<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Computer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number', 'status'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
