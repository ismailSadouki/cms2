<?php

namespace App\Http\ViewComposers;

use App\Models\Comment;
use Illuminate\View\View;

class CommentComposer 
{
    protected $recent_comments;

    public function __construct()
    {
        $this->recent_comments = Comment::with('post')->take(5)->latest()->get();

    }
    public function compose(View $view)
    {
        return $view->with('recent_comments', $this->recent_comments );
    }
}