<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Models\Wallpaper;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/wallpaper', function () {
//    $wallpaper = new Wallpaper();
//    $wallpaper->name = "test";
//    $wallpaper->is_public = true;
//    $wallpaper->download_count = 1;
//    $wallpaper->save();

    return Wallpaper::all();
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
