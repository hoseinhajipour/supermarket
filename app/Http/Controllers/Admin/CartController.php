<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
class CartController extends Controller
{
     public function index(Request $request) {
        $carts = Cart::paginate(10);
        return View('admin.cart.index', compact(['carts']));
    }

    public function delete(Cart $cart) {
        $cart->delete();
        return redirect::back();
    }
}
