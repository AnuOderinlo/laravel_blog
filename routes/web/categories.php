<?php

use Illuminate\Support\Facades\Route;

/* Users Route */

Route::middleware(['auth'])->group(function () {
    Route::get('categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('categories/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('categories/{category}/delete', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('categories/{category}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
});

