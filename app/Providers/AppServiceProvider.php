<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\ViewComposers\CategoryComposer');
        $this->app->singleton('App\Http\ViewComposers\PostComposer');
        $this->app->singleton('App\Http\ViewComposers\CommentComposer');
        $this->app->singleton('App\Http\ViewComposers\PageComposer');
        $this->app->singleton('App\Http\ViewComposers\SettingComposer');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer(['post.show', 'home','post.create','auth.login','auth.register','user.profile','user.settings','admin.pages.show'], 'App\Http\ViewComposers\CategoryComposer');
        View()->composer(['layout.sidebar', 'post.show', 'post.create','auth.login','auth.register','user.profile','user.settings','admin.pages.show'], 'App\Http\ViewComposers\PostComposer');
        View()->composer(['layout.sidebar', 'post.show', 'post.create','home','auth.login','auth.register','user.profile','user.settings','admin.pages.show'], 'App\Http\ViewComposers\CommentComposer');
        View()->composer(['layout.sidebar', 'post.show', 'post.create','home','auth.login','auth.register','user.profile','user.settings','admin.pages.show'], 'App\Http\ViewComposers\PageComposer');
        View()->composer(['layout.sidebar', 'post.show', 'post.create','home','auth.login','auth.register','user.profile','user.settings','admin.pages.show'], 'App\Http\ViewComposers\SettingComposer');
    }
}
