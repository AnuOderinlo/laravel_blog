<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::get('/admin/post/index', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::post('/admin/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::patch('/admin/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/admin/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
});
