<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Helpers\RequestParam;

class CommentController extends Controller {

    public function index(Request $request) {
       // $comments = Comment::paginate(10);
        
          $comments = Comment::query();

          $comments = RequestParam::where('id', $comments, true);
          $comments = RequestParam::where('parent_id', $comments, true);
          $comments = RequestParam::whereLike('name', $comments, false);
          $comments = RequestParam::where('slug', $comments, false);

          $comments = $comments->orderBy('id', 'DESC');
          $comments = $comments->simplePaginate(10);

        return View('admin.comment.index', compact(['comments']));
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            $comments = Comment::orderBy('name', 'ASC')->get();
            return View('admin.comment.create', compact(['comments']));
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
        $comment = Comment::create([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'parent_id' => $request->parent_id,
                    'sort' => $request->sort,
                    'icon' => $request->icon,
                    'type' => $request->type,
        ]);

        return redirect::route('admin.comment.index')->withErrors(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(Comment $comment, Request $request) {
        if ($request->isMethod('get')) {
            $comment = Comment::where('id', $request->id)->first();
            return View('admin.comment.update', compact(['comment']));
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

        $comment = Comment::find($request->id);
        $comment->name = $request->name;
        $comment->slug = $request->slug;
        $comment->parent_id = $request->parent_id;
        $comment->sort = $request->sort;
        $comment->icon = $request->icon;
        $comment->type = $request->type;
        $comment->save();


        return redirect::back()->withErrors(['success' => 'عملیات با موفقیت انجام شد. ']);
    }

    public function delete(Comment $comment) {
        $comment->delete();
        return redirect::back();
    }

}
