<?php

use Illuminate\Support\Facades\Route;

/* Users Route */

Route::middleware(['auth'])->group(function () {
    Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
    Route::post('permissions/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
    Route::get('permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
    Route::delete('permissions/{permission}/delete', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');
    Route::put('permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
});

