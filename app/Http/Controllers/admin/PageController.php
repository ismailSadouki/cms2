<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageFormRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public $page;
    public function __construct(Page $page)
    {
        $this->page = $page;
        $this->middleware('auth')->except('show');
    }

    public function index(){
        $pages = Page::get();
        return view('admin.pages.index',compact('pages'));
    }

    public function edit($id){
        $page = $this->page->find($id);
        return view('admin.pages.edit',compact('page'));  
    }

    public function update(PageFormRequest $request,$id){
        $page = $this->page->find($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->save();
        return back()->with('success' , 'نجح التعديل');
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(PageFormRequest $request)
    {
        $this->page->create($request->all());

        return back()->with('success', 'تم الحفظ بنجاح');
    }

    public function show($slug)
    {
        $page = $this->page->whereSlug($slug)->first();
        return view('admin.pages.show', compact('page'));
    }

    public function destroy($id)
    {
        $this->page->find($id)->delete();
        return back()->with('success', 'نجاح الحذف');
    }
}
