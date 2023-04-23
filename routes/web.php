<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index',])->name('admin.main');
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('admin.posts.delete');
    });
    Route::get('/{post}/comments/create', [CommentController::class, 'create'])->name('admin.comments.create');
    Route::post('/{post}/comments', [CommentController::class, 'store'])->name('admin.comments.store');
    Route::get('/{post}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('admin.comments.edit');
    Route::put('/{post}/comments/{comment}', [CommentController::class, 'update'])->name('admin.comments.update');
    Route::delete('/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.delete');

});
