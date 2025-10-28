<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Models\Wallpaper;

Route::get('/welcome', function () {
    return Inertia::render('welcome');
})->name('home');

Route::controller(\App\Http\Controllers\AppController::class)->group(function () {
    Route::get('/', 'index')->name('home');
})->name('app.');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/editor', function () {

})->name('editor');

Route::get('/account', function () {

})->name('account');

//Return one wallpaper info.
Route::get('/wallpaper', function () {
    $wallpaper = Wallpaper::first();
    dd($wallpaper);
    return view('wallpaper');
    return Wallpaper::all();
})->name('wallpaper');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
