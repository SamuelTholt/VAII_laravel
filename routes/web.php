<?php

use App\Http\Controllers\FotogaleriaController;
use App\Http\Controllers\JedlaController;
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

Route::get('/menu', function () {
    return view('menu');
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
Route::get('/recenzie/create', [ReviewsController::class, 'create'])->name('reviews.create')->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/recenzie', [ReviewsController::class, 'store'])->name('reviews.store');

Route::get('/recenzie/{id}/edit', [ReviewsController::class, 'edit'])->name('reviews.edit');

Route::put('/recenzie/{id}', [ReviewsController::class, 'update'])->name('reviews.update');

Route::delete('/recenzie/{id}', [ReviewsController::class, 'destroy'])->name('reviews.destroy');
require __DIR__.'/auth.php';

Route::get('/menu/data', [JedlaController::class, 'getMenu'])->name("menu.index");
Route::post('/menu/add', [JedlaController::class, 'addItem'])->name("menu.addItem");

Route::get('/menu/{id}/edit', [JedlaController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [JedlaController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [JedlaController::class, 'destroy'])->name('menu.destroy');


Route::get('/menu', [JedlaController::class, 'show'])->name('menu');



Route::get('/fotogaleria/data', [FotogaleriaController::class, 'getPhoto'])->name("fotogaleria.index");
Route::get('/fotogaleria/create', [FotogaleriaController::class, 'create'])->name('fotogaleria.create');
Route::post('/fotogaleria', [FotogaleriaController::class, 'store'])->name('fotogaleria.store');


Route::get('/fotogaleria/{id}/edit', [FotogaleriaController::class, 'edit'])->name('fotogaleria.edit');
Route::put('/fotogaleria/{id}', [FotogaleriaController::class, 'update'])->name('fotogaleria.update');

Route::delete('/fotogaleria/{id}', [FotogaleriaController::class, 'destroy'])->name('fotogaleria.destroy');



Route::get('/fotogaleria', [FotogaleriaController::class, 'show'])->name('fotogaleria');
