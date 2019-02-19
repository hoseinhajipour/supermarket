<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $fillable = ['name', 'slug', 'province_id'];

}
