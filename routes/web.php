<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::get('/', [Controllers\HomeController::class,'index'])->name('home');

Route::group(['as' => 'front.'],function(){
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/{slug}', [Controllers\CategoryController::class,'show'])->name('show');
    });
    Route::get('item/{slug}', [Controllers\ItemController::class,'show'])->name('item.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require_once __DIR__.'/custom/admin_routes.php';

require __DIR__.'/auth.php';
