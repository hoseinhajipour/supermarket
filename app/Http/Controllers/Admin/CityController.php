<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Model\City;
use App\Model\Province;

class CityController extends Controller {

    public function index(Request $request) {
        $cities = City::paginate(10);
        return View('admin.city.index', compact(['cities']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            $provinces = Province::orderBy('name', 'ASC')->get();
            return View('admin.city.create', compact(['provinces']));
        }
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:3',
                    'slug' => 'nullable|string',
                    'province_id' => 'nullable|numeric'
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $province = City::create([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'province_id' => $request->province_id
        ]);
        return redirect::route('admin.province.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(City $province, Request $request) {
        if ($request->isMethod('get')) {
            $city = City::where('id', $request->id)->first();
            $provinces = Province::orderBy('name', 'ASC')->get();
            return View('admin.city.update', compact(['city', 'provinces']));
        }
        $input = $request->only([
            'name', 'slug', 'province_id'
        ]);
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:3',
                    'slug' => 'nullable|string',
                    'province_id' => 'nullable|numeric'
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        $province = City::find($request->id);
        $province->name = $request->name;
        $province->slug = $request->slug;
        $province->province_id = $request->province_id;
        $province->save();
        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

    public function delete(City $province) {
        $province->delete();
        return redirect::back();
    }

}
