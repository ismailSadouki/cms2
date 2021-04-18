<?php

namespace App\Http\ViewComposers;

use App\Models\Post;
use Illuminate\View\View;

class PostComposer 
{
    protected $posts;

    public function __construct()
    {
        $this->posts = Post::latest()->take(5)->get();
    }
    public function compose(View $view)
    {
        return $view->with('posts', $this->posts );
    }
}