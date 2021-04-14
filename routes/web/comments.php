<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');


Route::middleware(['auth'])->group(function () {

   Route::get('/comments/index', [App\Http\Controllers\CommentController::class, 'index'])->name('comment.index');
   Route::delete('/comments/delete/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');

});
