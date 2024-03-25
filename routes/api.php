<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('home/catalogue-download', [HomeController::class, 'downloadCatalogue'])->name('api.catalogue.download');
Route::post('/contact-us', [HomeController::class, 'contact']);
