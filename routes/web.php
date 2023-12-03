<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
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
    return view('home');
});

Route::get('/fotogaleria', function () {
    return view('fotogaleria');
});

Route::get('/oNas', function () {
    return view('oNas');
});

Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/recenzie', [ReviewsController::class, 'index'])->name('reviews.index');
Route::get('/recenzie/create', [ReviewsController::class, 'create'])->name('reviews.create');

require __DIR__.'/auth.php';
