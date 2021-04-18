<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $user->administration_level = $request->administration_level;
        $user->save();

        return back()->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }
}
