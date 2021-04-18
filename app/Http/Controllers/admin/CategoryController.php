<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $category;

    
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.category',['categories' => $this->category->all()]);
    }

    public function store(CategoryFormRequest $request)
    {
         $this->category->create($request->all() + ['slug'=>$request->title]);

         return back()->with('success','تم الحفظ بنجاح');
    }

    public function destroy($id)
    {       
        $this->category->find($id)->delete();

        return back()->with('success','تم الحذف بنجاح');
    }
}
