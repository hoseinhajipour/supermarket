<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = ['user_id','title','description','slug','price','category_id','vote','discount','inventory','images','status'];
}
