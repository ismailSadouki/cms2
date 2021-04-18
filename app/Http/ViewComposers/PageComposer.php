<?php

namespace App\Http\ViewComposers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\View\View;

class PageComposer 
{
    protected $pages;

    public function __construct(Page $page)
    {
        $this->pages = $page->all();
    }
    public function compose(View $view)
    {
        return $view->with('pages', $this->pages );
    }
}