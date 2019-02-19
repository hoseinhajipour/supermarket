<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Factor;
use App\Models\User;

class Payment extends Model {

    protected $fillable = ['user_id', 'factor_id', 'price', 'authority'
        , 'refid', 'status', 'code', 'ip'];

    public function factor() {
        return $this->belongsTo(Factor::class, 'factor_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeQuery($query) {
        return $query;
    }

}
