<?php

use Illuminate\Support\Facades\Route;

/* Users Route */

Route::middleware(['auth'])->group(function () {
    Route::get('users/profile/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::get('users/index', [App\Http\Controllers\UserController::class, 'index'])->middleware('role:admin')->name('user.index');
    Route::put('users/index/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->middleware('role:admin')->name('role.attach');
    Route::put('users/index/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->middleware('role:admin')->name('role.detach');
    Route::put('users/profile/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('users/delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});
