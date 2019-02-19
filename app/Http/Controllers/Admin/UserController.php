<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Helpers\RequestParam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller {

    public function index() {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return View('admin.user.index', compact(['users']));
    }

    public function create(Request $request) {

        if ($request->isMethod('get')) {
            return View('admin.user.create');
        }

        $input = $request->only([
            'name', 'email', 'mobile'
        ]);
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:3',
                    'email' => 'nullable|string|min:3',
                    'mobile' => 'required|numeric'
        ]);
        $token = rand(100, 1000) . 'xxxx';
        $code = rand(100, 1000) . '';
        $susspend = 0;
        $user = User::create([
                    'mobile' => $request->mobile,
                    'name' => $request->name,
                    'email' => $request->email,
                    'token' => $token,
                    'code' => $code,
                    'susspend' => $susspend,
        ]);
        return redirect::route('admin.user.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(User $user, Request $request) {

        if ($request->isMethod('get')) {
            $user = User::where('id', $request->id)->first();
            return View('admin.user.update', compact(['user']));
        } else if ($request->isMethod('post')) {
            $input = $request->only([
                'name', 'email', 'mobile'
            ]);
            $validator = Validator::make($request->all(), [
                        'name' => 'required|string|min:3',
                        'email' => 'nullable|string|min:3',
                        'mobile' => 'required|string'
            ]);
            if ($validator->fails()) {
                return redirect::back()->withInput()->withErrors($validator);
            }

            $user->update([
                    'mobile' => $request->mobile,
                    'name' => $request->name,
                    'email' => $request->email]);
            return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. '."$request->mobile"]);
        }
    }

    public function delete(User $user) {
        $user->delete();
        return redirect::back();
    }

    public function susspend(User $user) {
        if ($user->susspend) {
            $user->susspend = false;
        } else {
            $user->susspend = true;
        }
        $user->save();
        return redirect::back();
    }

}
