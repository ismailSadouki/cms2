<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingFormRequest;
use App\Models\Setting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings', compact('setting'));
    }

    public function updateOrStore(SettingFormRequest $request)
    {
        if(isset($request->img)){
            $img = time().'.'.$request->img->extension();  
            $request->img->move(public_path('images'), $img);
            $request->merge(['logo' => $img]);
        }

        if(isset($request->image)){
            $image = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $image);
            $request->merge(['image_main' => $image]);
        }

        if(isset($request->id)){
            $setting = Setting::first();
            $setting->update($request->all());
        }else {
            Setting::create($request->all());
        }


        return back()->with('success','تم التعديل بنجاح');
    }
}
