<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
class Shop extends Model {

    protected $fillable = ['user_id', 'category_id', 'title', 'description', 'logo'
        , 'category_id', 'domain', 'type', 'address', 'phone', 'approved', 'expire',
        'hidden', 'sort'];
    
    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }
     public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

}
