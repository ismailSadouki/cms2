<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormRequest;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ImageUploadTrait;

    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth', ['only' => ['settings', 'updateProfile']]);

    }
    
    public function getByUser($id)
    {
        $contents = $this->user->with('posts')->find($id);


        return view('user.profile', compact('contents'));
    }

    public function getCommentsByUser($id)
    {
        $contents = $this->user->with('comments.post')->find($id);
        return view('user.profile', compact('contents'));

    }

    public function settings()
    {
        $user = User::find(Auth::id());
        return view('user.settings', compact('user'));
    }

    public function updateProfile(ProfileFormRequest $request)
    {
        if(isset($request->avatar_file)){
            $avatar = time().'.'.$request->avatar_file->extension();  
            $request->avatar_file->move(public_path('avatars'), $avatar);
            $request->merge(['avatar' => $avatar]);

            // $avatar = $this->uploadAvatar($request->avatar_file);
        }

        auth()->user()->updateOrCreate(['id' => Auth::id()],$request->only(['name','email','bio','avatar']));

        return back()->with('success','تم التعديل بنجاح');
        
    }
}
