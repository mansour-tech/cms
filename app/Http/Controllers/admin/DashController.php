<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    Post,
    User,
    Category,
    Comment,
};

class DashController extends Controller
{
    public function index()
    {
        return view('admin.index')
        ->with('posts_count'        ,Post::count())
        ->with('users_count'        ,User::count())
        ->with('categories_count'   ,Category::count())
        ->with('comments_count'     ,Comment::count());

    }
}
