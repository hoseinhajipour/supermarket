<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Address;
use App\Model\Province;
use App\Model\City;
use App\Models\User;

class Factor extends Model {

    protected $fillable = ['user_id', 'province_id', 'city_id', 'address_id'
        , 'price', 'discount_price', 'final_price'
        , 'expire', 'shipping_cost', 'status'
        , 'description', 'postal_code_tracking', 'postal_code_description'];

    public function province() {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function address() {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeQuery($query) {
        return $query;
    }

}
