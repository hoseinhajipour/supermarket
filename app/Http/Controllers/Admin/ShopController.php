<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestParam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ShopController extends Controller {

    public function index(Request $request) {
        $shops = Shop::paginate(10);
        /*
          $shops = Shop::query();

          $shops = RequestParam::where('id', $shops, true);
          $shops = RequestParam::where('parent_id', $shops, true);
          $shops = RequestParam::whereLike('name', $shops, false);
          $shops = RequestParam::where('slug', $shops, false);

          $products = $shops->orderBy('id', 'DESC');
          $products = $shops->simplePaginate(10);

          $categories = Chategory::all();
         */
        return View('admin.shop.index', compact(['shops']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            $categories = Category::all();
            $users = User::all();
            return View('admin.shop.create', compact(['categories', 'users']));
        }

        $validator = Validator::make($request->all(), [
                    'title' => 'required|string|min:3',
                    'user_id' => 'required|numeric',
                    'category_id' => 'nullable|numeric',
                    'description' => 'nullable|string',
                    'address' => 'nullable|string',
                    'phone' => 'numeric',
                    'sort' => 'numeric',
                    'logo' => 'nullable|string',
                    'domain' => 'nullable|string',
                    'type' => 'nullable|string',
                    'approved' => 'nullable',
                    'hidden' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $shop = Shop::create([
                    'title' => $request->title,
                    'user_id' => $request->user_id,
                    'category_id' => $request->category_id,
                    'description' => $request->description,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'sort' => $request->sort,
                    'logo' => $request->logo,
                    'domain' => $request->domain,
                    'type' => $request->type,
                    'approved' => $request->has('approved'),
                    'hidden' => $request->has('hidden'),
                    'expire' => Carbon::now()->addDay(90),
        ]);

        return redirect::route('admin.shop.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(Shop $shop, Request $request) {
        if ($request->isMethod('get')) {
            $shop = Shop::where('id', $request->id)->first();
            $categories = Category::all();
            $users = User::all();
            return View('admin.shop.update', compact(['shop', 'categories', 'users']));
        }
        $input = $request->only([
            'title', 'user_id', 'category_id', 'description', 'address', 'phone'
            , 'phone', 'sort', 'logo', 'domain', 'type', 'approved', 'hidden'
            , 'expire'
        ]);
        $validator = Validator::make($request->all(), [
                    'title' => 'required|string|min:3',
                    'user_id' => 'required|numeric',
                    'category_id' => 'nullable|numeric',
                    'description' => 'nullable|string',
                    'address' => 'nullable|string',
                    'phone' => 'numeric',
                    'sort' => 'numeric',
                    'logo' => 'nullable|string',
                    'domain' => 'nullable|string',
                    'type' => 'nullable|string',
                    'approved' => 'nullable',
                    'hidden' => 'nullable',
                    'expire' => 'date',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        $shop = Shop::find($request->id);
        $shop->title = $request->title;
        $shop->user_id = $request->user_id;
        $shop->category_id = $request->category_id;
        $shop->description = $request->description;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->sort = $request->sort;
        $shop->logo = $request->logo;
        $shop->domain = $request->domain;
        $shop->type = $request->type;
        $shop->approved = $request->has('approved');
        $shop->hidden = $request->has('hidden');
        $shop->expire = $request->expire;

        $shop->save();


        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

    public function delete(Shop $shop) {
        $shop->delete();
        return redirect::back();
    }

}
