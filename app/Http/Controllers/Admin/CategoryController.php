<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\RequestParam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller {

    public function index(Request $request) {
        $categories = Category::paginate(10);
        return View('admin.category.index', compact(['categories']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            $categories = Category::orderBy('name', 'ASC')->get();
            return View('admin.category.create', compact(['categories']));
        }

        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:3',
                    'slug' => 'required|string|min:3',
                    'parent_id' => 'numeric',
                    'sort' => 'numeric',
                    'icon' => 'string',
                    'type' => 'string',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $category = Category::create([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'parent_id' => $request->parent_id,
                    'sort' => $request->sort,
                    'icon' => $request->icon,
                    'type' => $request->type,
        ]);

        return redirect::route('admin.category.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(Category $category, Request $request) {
        if ($request->isMethod('get')) {
            $category = Category::where('id', $request->id)->first();
            return View('admin.category.update', compact(['category']));
        }
        $input = $request->only([
            'name', 'slug', 'parent_id', 'sort', 'icon', 'type'
        ]);
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:3',
                    'slug' => 'required|string|min:3',
                    'parent_id' => 'numeric',
                    'sort' => 'numeric',
                    'icon' => 'string',
                    'type' => 'string',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->sort = $request->sort;
        $category->icon = $request->icon;
        $category->type = $request->type;
        $category->save();


        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

    public function delete(Category $category) {
        $category->delete();
        return redirect::back();
    }

}
