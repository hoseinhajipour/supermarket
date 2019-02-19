<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Province;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProvinceController extends Controller {

    public function index(Request $request) {
        $provinces = Province::paginate(10);
        return View('admin.province.index', compact(['provinces']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            return View('admin.province.create');
        }
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:3',
                    'slug' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $province = Province::create([
                    'name' => $request->name,
                    'slug' => $request->slug
        ]);
        return redirect::route('admin.province.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(Province $province, Request $request) {
        if ($request->isMethod('get')) {
            $province = Province::where('id', $request->id)->first();
            return View('admin.province.update', compact(['province']));
        }
        $input = $request->only([
            'name', 'slug'
        ]);
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:3',
                    'slug' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        $province = Province::find($request->id);
        $province->name = $request->name;
        $province->slug = $request->slug;
        $province->save();
        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

    public function delete(Province $province) {
        $province->delete();
        return redirect::back();
    }

}
