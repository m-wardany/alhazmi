<?php

use App\Http\Controllers\AwardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/info/edit/{info:language}', [InfoController::class, 'edit'])->name('info.edit')->whereIn('info', ['ar', 'en']);
    Route::post('/info/update/{info:language}', [InfoController::class, 'update'])->name('info.update');
    Route::resources([
        'slider' => SliderController::class,
        'product' => ProductController::class,
        'award' => AwardController::class,
        'branch' => BranchController::class,
        'socialmedia' => SocialMediaController::class,
    ]);
});

require __DIR__ . '/auth.php';
