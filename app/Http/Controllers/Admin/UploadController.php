<?php

namespace App\Http\Controllers\Admin;

use App\Models\Upload;
use App\Helpers\RequestParam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;

class UploadController extends Controller {

    public function index(Request $request) {
        $uploads = Upload::paginate(10);
        /*
          $uploads = Upload::query();

          $uploads = RequestParam::where('id', $uploads, true);
          $uploads = RequestParam::where('user_id', $uploads, true);
          $uploads = RequestParam::whereLike('src', $uploads, false);

          $uploads = $uploads->orderBy('id', 'DESC');
          $uploads = $uploads->simplePaginate(10);
         */
        return View('admin.upload.index', compact(['uploads']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            return View('admin.upload.create');
        }

        $validator = Validator::make($request->all(), [
                    'file' => 'required|mimes:jpeg,jpg,png,zip,rar|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }

        if ($request->file('file')) {
            $file = $request->file('file');
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
            }
        }


        return redirect::route('admin.upload.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function delete(Request $request) {
        $upload_ = Upload::find($request->id);
        $upload_->delete();

        return redirect::back();
    }

}
