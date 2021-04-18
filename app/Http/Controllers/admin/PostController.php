<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostFormRequestUpdate;
use App\Models\Category;
use App\Models\Post;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use ImageUploadTrait;
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = $this->post::with('user:id,name','category')->latest()->paginate(10);

        return view('admin.posts.all', compact('posts'));
    }

    public function edit($id)
    {
        $categories = Category::get();
        $post = $this->post::find($id);

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(PostFormRequestUpdate $request, $id)
    {
        if($request->hasFile('image')){
            $image_name = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $image_name);
            $this->post->find($id)->update($request->all()+['user_id' => Auth::id(),'image_path' => $image_name]);
        }else {
            $this->post->find($id)->update($request->all());
        }

        return back()->with('success','تم التعديل بنجاح');
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $image_name = $this->uploadImage($request->image);
        Post::create($request->all()+['user_id' => Auth::id(),'image_path' => $image_name]);
        return back()->with('success', 'تم الحفظ بنجاح');
    }

    public function destroy($id)
    {
        $this->post::find($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }

}
