<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {
       $posts_count = Post::count();
       $users_count = User::count();
       $comments_count = Comment::count();
       $categories_count = Category::count();
       return view('admin.index',compact('categories_count', 'comments_count', 'users_count' ,'posts_count'));
   }
}
