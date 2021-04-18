<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('create/post/', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('create/post/', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::post('/search', [App\Http\Controllers\PostController::class, 'search'])->name('search');

Route::get('category/{id}/{slug}',  [App\Http\Controllers\PostController::class, 'getByCategory'])->name('category');


Route::resource('comment', 'App\Http\Controllers\CommentController');
Route::post('/comment/reply', [App\Http\Controllers\CommentController::class, 'reply'])->name('reply');

Route::get('/user/{id}', [App\Http\Controllers\ProfileController::class, 'getByUser'])->name('profile');

Route::get('/user/comments/{id}', [App\Http\Controllers\ProfileController::class, 'getCommentsByUser'])->name('profile.comments');

Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name('settings');
Route::post('/settings', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('settings');


Route::get('/dashboard/index', [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard.index')->middleware('can:login-dashboard');

Route::resource('/dashboard/posts', 'App\Http\Controllers\admin\PostController')->middleware('can:update-posts');
Route::resource('/dashboard/page', 'App\Http\Controllers\admin\PageController')->middleware('can:update-pages');
Route::get('/dashboard/page/{page}', 'App\Http\Controllers\admin\PageController@show')->name('page.show');
Route::resource('/dashboard/category', 'App\Http\Controllers\admin\CategoryController')->middleware('can:update-categories');
Route::resource('/dashboard/users', 'App\Http\Controllers\admin\UsersController')->middleware('can:update-users');


Route::get('/dashboard/settings', [App\Http\Controllers\admin\SettingsController::class, 'index'])->name('site.settings')->middleware('can:update-users');;
Route::post('/dashboard/settings', [App\Http\Controllers\admin\SettingsController::class, 'updateOrStore'])->name('site.settings.updateOrStore')->middleware('can:update-users');;




