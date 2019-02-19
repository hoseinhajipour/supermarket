<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Upload;
use App\Helpers\RequestParam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller {

    public function index(Request $request) {

        $products = Product::paginate(10);
        /*
          $products = Product::where('id', $products, true);
          $products = Product::where('category_id', $products, true);
          $products = Product::whereLike('title', $products, true);
          $products = Product::where('slug', $products, true);

          $products = $products->orderBy('id', 'DESC');
          $products = $products->simplePaginate(15);
          /*
          $categoreis = Category::all();
         */
        return View('admin.product.index', compact(['products', 'categories']));
    }

    public function create(Request $request) {

        if ($request->isMethod('get')) {
            $categories = Category::orderBy('name', 'ASC')->get();
            return View('admin.product.create', compact(['categories']));
        }
        /*
          $validator = Validator::make($request->all(), [
          'title' => 'required|string|min:3',
          'description' => 'required|string|min:3',
          'slug' => 'nullables|string',
          'price' => 'required|numeric',
          'discount' => 'numeric',
          'inventory' => 'numeric',
          'images' => 'nullables|string',
          'status' => 'numeric',
          ]);
          if ($validator->fails()) {
          return redirect::back()->withInput()->withErrors($validator);
          } */
        $product = Product::create([
                    'user_id' => 1,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'category_id' => $request->category_id,
                    'inventory' => $request->inventory,
                    'images' => $request->images,
                    'status' => $request->status,
        ]);
        return redirect::route('admin.product.index');
    }

    public function update(Product $product, Request $request) {
        if ($request->isMethod('get')) {
            $product = Product::where('id', $request->id)->first();
            $categories = Category::orderBy('name', 'ASC')->get();
            return View('admin.product.update', compact(['product', 'categories']));
        }
        $input = $request->only([
            'title', 'description', 'slug', 'price', 'discount', 'inventory', 'images', 'status'
        ]);
        $validator = Validator::make($request->all(), [
                    'title' => 'required|string|min:3',
                    'description' => 'required|string|min:3',
                    'slug' => 'nullables|string',
                    'price' => 'required|numeric',
                    'discount' => 'numeric',
                    'inventory' => 'numeric',
                    'images' => 'nullables|string',
                    'status' => 'numeric',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $product->update($input);
        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect::back();
    }

    public function approved(Product $product) {
        if ($product->approved) {
            $product->approved = false;
        } else {
            $product->approved = true;
        }
        $product->save();
        return redirect::back();
    }

    public function upload(Product $product, Request $request) {
        if ($request->isMethod('get')) {
            return View('admin.product.upload', compact(['product']));
        }

        $validator = Validator::make($request->all(), [
                    'file' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        if ($request->file('file')) {
            $file = $request->file('file');

            $imgArr = [];
            if (!empty($product->images)) {
                $imgArr = json_decode($product->images, true);
            }

            $newName = time() . '.jpg';
            $img = Image::make($file->getRealPath());
            $x = $img->width();
            if ($img->width() < 2000 || $img->height() < 400) {
                return redirect::back()->withErrors(['err' => 'طول و عرض تصویر باید بزرگتر از 400 پیکسل باشد']);
            }

            if ($img->width() > 400) {
                $img->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->response('jpg');
                $img->save(public_path('/photo/tmp/' . $newName));
            }
            $img = Image::make(public_path('/photo/tmp/' . $newName));
            $img->crop(400, 400, 0, 0);
            $img->response('jpg');
            $img->save(public_path('/photo/big/' . $newName));

            $img = Image::make(public_path('/photo/tmp/' . $newName));
            $img->resize(100, 100);
            $img->save(public_path('/photo/small/' . $newName));

            $src = time() . '_' . $file->getClientOriginalName();
            $mime = $file->getClientMimeType();
            $size = $file->getSize();
            $type = 'file';
            $status = '1';
            if ($file->move(public_path('/uploads'), $src)) {
                $upload = Upload::create([
                            'user_id' => 1,
                            'src' => $src,
                            'mime' => $mime,
                            'size' => $size,
                            'type' => $type,
                            'status' => $status,
                            'ip' => $request->ip(),
                ]);

                array_push($imgArr, [
                    "src" => $newName,
                    "pin" => empty($product->images) ? true : false
                ]);
                $product->images = json_encode($imgArr);
                $product->save();
            }
        }
        return redirect::back()->withErrors(['success' => 'تصویر مورد نظر آپلود شد']);
    }

    public function deleteImg($id, Product $product) {
        $imgArr = json_decode($product->$images, true);
        if (!empty($imgArr[$id])) {
            unset($imgArr[$id]);
        }
        $newArr = [];
        $pin = true;
        foreach ($imgArr as $key => $value) {
            array_push($newArr, [
                "src" => $value->src,
                "pin" => empty($pin) ? true : false
            ]);
            $pin = false;
        }
        $product->images = json_encode($newArr);
        $product->save();
        return redirect::back()->withErrors(['success' => 'تصویر حذف شد']);
    }

    public function pinImg(Product $product, $id) {
        $imgArr = json_decode($product->$images, true);
        $newArr = [];
        foreach ($imgArr as $key => $value) {
            array_push($newArr, [
                "src" => $value->src,
                "pin" => $key == $id ? true : false
            ]);
        }
        $product->images = json_encode($newArr);
        $product->save();
        return redirect::back()->withErrors(['success' => 'تصویر انتخاب شد']);
    }

}
