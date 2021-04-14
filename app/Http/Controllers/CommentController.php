<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function store(Request $request)
    {
       
        $inputs = request()->validate([
            'name' => 'required',
            'post_id' => 'required',
            'body' => 'required',

        ]);
        $inputs['name'] = strip_tags($request->name);
        $inputs['post_id'] = strip_tags($request->post_id);
        $inputs['body'] = strip_tags($request->body);

        Comment::create($inputs);
        return back();
        // $request->session()->flash('success-message', 'Post created successfully');

        // return redirect()->route('post.index');


    }



    public function index()
    {
        $posts = Auth::user()->posts;

        return view('admin.comments.index', ['posts' => $posts]);
        
        
    }


    public function destroy(Comment $comment, Request $request)
    {
        $comment->delete();

        return back();
    }
}
