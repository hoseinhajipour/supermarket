<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Model\Address;
use App\Model\Province;
use App\Model\City;

class AddressController extends Controller {

    public function index(Request $request) {
        $addresss = Address::paginate(10);
        $province = Province::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();
        return View('admin.address.index', compact(['addresss', 'province', 'cities']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            $provinces = Province::orderBy('name', 'ASC')->get();
            $cities = City::orderBy('name', 'ASC')->get();
            return View('admin.address.create', compact(['provinces', 'cities']));
        }
        $validator = Validator::make($request->all(), [
                    'province_id' => 'nullable|numeric|string',
                    'city_id' => 'nullable|numeric|numeric',
                    'address' => 'string||min:3',
                    'postal_code' => 'nullable|numeric',
                    'phone' => 'nullable|numeric',
                    'lat' => 'nullable|numeric',
                    'lng' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $Address = Address::create([
                    'user_id' => 1,
                    'province_id' => $request->province_id,
                    'city_id' => $request->city_id,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code,
                    'phone' => $request->phone,
                    'lat' => $request->lat,
                    'lng' => $request->lng
        ]);
        return redirect::route('admin.address.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(Address $province, Request $request) {
        if ($request->isMethod('get')) {
            $address = Address::where('id', $request->id)->first();
            $provinces = Province::orderBy('name', 'ASC')->get();
            $cities = City::orderBy('name', 'ASC')->get();
            return View('admin.address.update', compact(['address', 'provinces', 'cities']));
        }
        $input = $request->only([
            'name', 'slug', 'province_id'
        ]);
        $validator = Validator::make($request->all(), [
                    'user_id' => 1,
                    'province_id' => $request->province_id,
                    'city_id' => $request->city_id,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code,
                    'phone' => $request->phone,
                    'lat' => $request->lat,
                    'lng' => $request->lng
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        $address = Address::find($request->id);
        $address->user_id = $request->user_id;
        $address->province_id = $request->province_id;
        $address->city_id = $request->city_id;
        $address->address = $request->address;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->lat = $request->lat;
        $address->lng = $request->lng;
        
        $address->save();
        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

    public function delete(Address $address) {
        $address->delete();
        return redirect::back();
    }

}
