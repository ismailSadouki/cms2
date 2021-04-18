<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\View\View;

class SettingComposer 
{
    protected $setting;

    public function __construct()
    {
        $this->setting = Setting::first();
    }
    public function compose(View $view)
    {
        return $view->with('setting', $this->setting );
    }
}