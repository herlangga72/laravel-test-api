<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Blog\BlogAdminController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Category\CategoryAdminController;

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

Route::get('/', function () {
    return redirect('/blogs/');;
})->name('homepage');

Route::controller(LoginController::class)->group(function(){
    Route::get('login/', 'index')->name('login');
    Route::post('login/', 'authenticate')->name('login.post');
    Route::get('logout/', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('register', 'index')->name('register');
    Route::post('register', 'register')->name('register.post');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('blogs/', 'index')->name('blogs.list');
    Route::get('blogs/{id}', 'show')->name('blogs.show'); 
});

Route::controller(SocialiteController::class)->group(function(){
    Route::get('/auth/google/redirect/', 'googleRedirect')->name('google.redirect');
    Route::get('/auth/google/handle', 'googleOAuth')->name('google.handle');
});

Route::middleware('auth')->controller(BlogAdminController::class)->group(function(){
    // web
    Route::get('admin/blogs/', 'index')->name('blogsAdmin.list');
    Route::get('admin/blogs/create', 'create')->name('blogsAdmin.create');
    Route::get('admin/blogs/{id}', 'show')->name('blogsAdmin.show');
    Route::get('admin/blogs/{id}/edit', 'edit')->name('blogsAdmin.edit');
    // back process
    Route::post('admin/blogs/', 'store')->name('blogsAdmin.store');
    Route::put('admin/blogs/{id}', 'update')->name('blogsAdmin.update');
    Route::delete('admin/blogs/{id}/destroy', 'destroy')->name('blogsAdmin.destroy');
});

Route::middleware('auth')->controller(CategoryAdminController::class)->group(function(){
    // web
    
    Route::get('admin/categories/', 'index')->name('categoryAdmin.list');
    // Route::get('admin/categories/create', 'create')->name('categoryAdmin.create');
    // Route::get('admin/categories/{id}', 'show')->name('categoryAdmin.show');
    // Route::get('admin/categories/{id}/edit', 'edit')->name('categoryAdmin.edit');
    
    // back process
    
    // Route::post('admin/categories/', 'store')->name('categoryAdmin.store');
    // Route::put('admin/categories/{id}', 'update')->name('categoryAdmin.update');
    // Route::delete('admin/categories/{id}/destroy', 'destroy')->name('categoryAdmin.destroy');
});