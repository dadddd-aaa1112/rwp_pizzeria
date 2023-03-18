<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function prices() {
        return $this->belongsTo(Price::class, 'price_id', 'id');
    }

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
