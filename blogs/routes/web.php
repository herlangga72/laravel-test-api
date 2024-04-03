<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\BlogController;
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

Route::controller(BlogController::class)->group(function(){
    Route::get('blogs/', 'index')->name('blogs.list');
    Route::get('blogs/{id}', 'show')->name('blogs.show'); 
});


Route::controller(BlogAdminController::class)->group(function(){
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