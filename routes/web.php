<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes (Inertia.js + Vue 3)
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => Inertia::render('Index'))->name('home');
Route::get('/about', fn () => Inertia::render('About'))->name('about');
Route::get('/programs', fn () => Inertia::render('Programs'))->name('programs');
Route::get('/governance', fn () => Inertia::render('Governance'))->name('governance');
Route::get('/gallery', fn () => Inertia::render('Gallery'))->name('gallery');
Route::get('/get-involved', fn () => Inertia::render('GetInvolved'))->name('get-involved');

// Contact Form Routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
