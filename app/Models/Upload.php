<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

    protected $fillable = ['user_id', 'src', 'mime', 'size', 'type', 'status', 'ip'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeQuery($query) {
        return $query;
    }

}
