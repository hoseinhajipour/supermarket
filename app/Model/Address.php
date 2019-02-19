<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     protected $fillable = ['user_id', 'province_id', 'city_id', 'address'
         , 'postal_code', 'phone', 'lat', 'lng'];
}
