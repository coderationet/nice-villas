<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as' => 'front.'], function () {
    Route::get('item/{slug}', [Controllers\ItemController::class, 'show'])->name('item.show');
    Route::get('villas/{slug}', [Controllers\CategoryController::class, 'show'])->name('category.show');
    Route::get('page/{slug}', [Controllers\PageController::class, 'show'])->name('page.show');
    Route::get('contact', [Controllers\PageController::class, 'contact'])->name('page.contact');
});

require_once __DIR__ . '/custom/admin_routes.php';

require __DIR__ . '/auth.php';
