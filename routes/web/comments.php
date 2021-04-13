<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');


Route::middleware(['auth'])->group(function () {
   
});
