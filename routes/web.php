<?php

use App\Http\Controllers\AwardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/info/edit/{info:language}', [InfoController::class, 'edit'])->name('info.edit')->whereIn('info', ['ar', 'en']);
    Route::post('/info/update/{info:language}', [InfoController::class, 'update'])->name('info.update');
    Route::prefix('product')->group(function () {
        Route::get('catalogue', [ProductController::class, 'editCatalogue'])->name('edit.catalogue');
        Route::put('catalogue', [ProductController::class, 'updateCatalogue'])->name('update.catalogue');
        Route::get('catalogue/download', [ProductController::class, 'downloadCatalogue'])->name('download.catalogue');
    });
    Route::resources([
        'slider' => SliderController::class,
        'partner' => PartnerController::class,
        'product' => ProductController::class,
        'award' => AwardController::class,
        'branch' => BranchController::class,
        'socialmedia' => SocialMediaController::class,
    ]);
    Route::resource('setting', SettingController::class)->only(['index', 'create', 'store']);
});

require __DIR__ . '/auth.php';
