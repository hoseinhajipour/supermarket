<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Factor;
use App\Models\User;
use App\Models\Shop;
use App\Models\Payment;

class Wallet extends Model {

    protected $fillable = ['user_id', 'shop_id', 'factor_id', 'payment_id'
        , 'amount', 'oldAmount', 'newAmount', 'status', 'description'];

    public function factor() {
        return $this->belongsTo(Factor::class, 'factor_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function scopeQuery($query) {
        return $query;
    }

}
