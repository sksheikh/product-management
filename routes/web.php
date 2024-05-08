<?php

use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');

Route::post('/profile/uoload', [ImageUploadController::class, 'uploadImage'])->name('profile.image.upload');
