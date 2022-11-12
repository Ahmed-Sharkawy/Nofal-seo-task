<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('home', [PostController::class, 'index'])->name('posts.index');

    Route::group(['middleware' => 'isAuthor'], function () {
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
        Route::get('posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
        // Route::delete('posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
        Route::get('posts/onlyTrashed', [PostController::class, 'onlyTrashed'])->name('posts.onlyTrashed');
        Route::get('posts/{id}/forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');

    });
    Route::post('posts/{id}/comment', [CommentController::class, 'store'])->name('comment.post');
});
