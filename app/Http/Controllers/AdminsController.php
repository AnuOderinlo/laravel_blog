<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function index()
    {
        $posts =  Post::all();
        $users = User::all();
        $comments = Comment::all();
        $categories = Category::all();
        return view('admin.index', ["posts"=>$posts, "users"=>$users, "comments"=>$comments, "categories"=>$categories]);
    }
}
