<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    // Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    // Route::get('/admin/post/index', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    // Route::post('/admin/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    // Route::patch('/admin/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    // Route::delete('/admin/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    // Route::get('/admin/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    
    // /* Users Route */
    // Route::get('users/profile/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    // Route::get('users/index', [App\Http\Controllers\UserController::class, 'index'])->middleware('role:admin')->name('user.index');
    // Route::put('users/index/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->middleware('role:admin')->name('role.attach');
    // Route::put('users/index/{user}/detach', [App\Http\Controllers\UserController::class, 
    
    
});
 