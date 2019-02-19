<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class RequestParam {

    public static function where($name, $query, $int = false) {
        if (empty(\request($name))) {
            $query = $query->where($name, $name);
        }
        return $query;
    }

    public static function whereLike($name, $query, $int = false) {
        if (empty(\request($name))) {
            $query = $query->where($name, $name)->orWhere($name, $query)
                    ->get();
        }
        return $query;
    }

}
