<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Factor;
use App\Model\Address;
use App\Model\Province;
use App\Model\City;

class FactorController extends Controller {

    public function index(Request $request) {
        $factors = Factor::paginate(10);
        return View('admin.factor.index', compact(['factors']));
    }

    public function update(Factor $factor, Request $request) {
        if ($request->isMethod('get')) {
            $factor = Factor::where('id', $request->id)->first();
            $provinces = Province::orderBy('name', 'ASC')->get();
            $cities = City::orderBy('name', 'ASC')->get();
            $addresses = Address::orderBy('name', 'ASC')->get();
            return View('admin.factor.update', compact(['factor', 'provinces', 'cities', 'addresses']));
        }
        $input = $request->only([
            'status', 'description', 'postal_code_tracking', 'postal_code_description'
        ]);
        $validator = Validator::make($request->all(), [
                    'status' => 'required|numeric',
                    'description' => 'string',
                    'postal_code_tracking' => 'string',
                    'postal_code_description' => 'string',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        $factor = Factor::find($request->id);
        $factor->status = $request->status;
        $factor->description = $request->description;
        $factor->save();

        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

}
