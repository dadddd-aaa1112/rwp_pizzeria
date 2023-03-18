<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
