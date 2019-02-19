<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Shop;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WalletController extends Controller {

    public function index(Request $request) {
        $wallets = Wallet::paginate(10);
        return View('admin.wallet.index', compact(['wallets']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            return View('admin.wallet.create');
        }

        $validator = Validator::make($request->all(), [
                    'user_id' => 'required|numeric',
                    'shop_id' => 'nullable|numeric',
                    'price' => 'required|numeric',
                    'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        if (!empty($request->user_id)) {
            $user = User::find((int) $request->user_id);
            if ($user) {
                $oldPrice = Wallet::where('user_id', $user->id)->orderBy('id', 'DESC')->first();
                if ($oldPrice) {
                    $oldPrice = $oldPrice->oldAmount;
                } else {
                    $oldPrice = 0;
                }
            } else {
                return redirect::back()->withErrors(['err' => 'کاربر یافت نشد'])->withInput();
            }
            $user_id = $user->id;
        }

        if (!empty($request->shop_id)) {
            $shop = Shop::find((int) $request->shop_id);
            if ($shop) {
                $oldPrice = Wallet::where('shop_id', $shop->id)->orderBy('id', 'DESC')->first();
                if ($oldPrice) {
                    $oldPrice = $oldPrice->oldAmount;
                } else {
                    $oldPrice = 0;
                }
            } else {
                return redirect::back()->withErrors(['err' => 'فروشگاه یافت نشد'])->withInput();
            }
            $shop_id = $shop->id;
            $user_id = $shop->user->id;
        }
        $wallet = Wallet::create([
                    'user_id' => $request->user_id,
                    'shop_id' => $request->shop_id,
                    'amount' => $request->price,
                    'oldAmount' => $oldPrice,
                    'newAmount' => $request->price + $oldPrice,
                    'status' => 1,
                    'description' => $request->description
        ]);

        return redirect::route('admin.wallet.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(Wallet $wallet, Request $request) {
        if ($request->isMethod('get')) {
            $wallet = Wallet::where('id', $request->id)->first();

            return View('admin.wallet.update', compact(['wallet']));
        }
        $input = $request->only([
            'description'
        ]);
        $validator = Validator::make($request->all(), [
                    'description' => 'string',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        $wallet = Wallet::find($request->id);
        $wallet->description = $request->description;
        $wallet->save();

        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

}
