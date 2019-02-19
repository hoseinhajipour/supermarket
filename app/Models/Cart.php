<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Shop;
use App\Models\Factor;
use App\Models\Product;

class Cart extends Model
{
     protected $fillable = ['user_id', 'shop_id', 'factor_id', 'product_id'
        , 'count', 'price', 'discount_price', 'status'];

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function factor() {
        return $this->belongsTo(Factor::class, 'factor_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeQuery($query) {
        return $query;
    }
}
