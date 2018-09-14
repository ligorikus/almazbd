<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'admin_id', 'computer_id'
    ];

    public function computer() {
        return $this->belongsTo(Computer::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class, 'order_services')->withPivot('count');
    }

    public function admin() {
        return $this->belongsTo(User::class);
    }
}
