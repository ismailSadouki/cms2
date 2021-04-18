<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Http\Requests\SearchFormRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ImageUploadTrait;

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'create' , 'destroy']]);
    }
    public function show(Post $post)
    {
        $comments = Comment::where(['post_id'=> $post->id, 'parent_id' => null])->with('user')->get();
        return view('post.show', compact('post','comments'));
    }

    public function search(SearchFormRequest $request)
    {
        $posts = Post::where('body', 'LIKE','%'.$request->keyword.'%')->with('user:id,name')->paginate(5);
        return view('home' ,compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(PostFormRequest $request)
    {
        // $image_name = $this->uploadImage($request->image);
        $image_name = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $image_name);
        Post::create($request->all()+['user_id' => Auth::id(),'image_path' => $image_name]);
        return back()->with('success', 'تم الحفظ بنجاح');
    }

  

    public function destroy($id)
    {
        $post = Post::find($id);
        if (auth()->user()->can('delete', $post)){
            $post->delete();
            return back();
        }else {
            return redirect('not_found');
        }
        
    }


    public function getByCategory($id)
    {
        $posts = Post::latest()->whereCategoryId($id)->paginate(10);
        return view('home', compact('posts'));
    }

  
}
