<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\RacunController;

Route::get('/racuni', [RacunController::class, 'index'])->name('racuni.index');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/**
 * Rute samo za ulogovane korisnike, autentifikovane
 */

// Admin routes
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::get('/sve-valute', [ProductController::class, 'allProducts'])->name('products.all');
Route::get('/kontakt', [ContactController::class, 'index'])->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::resource('korisnici', KorisnikController::class);
});


##
Route::post('korisnici', [KorisnikController::class, 'store'])->name('korisnici.store');
Route::resource('korisnici', KorisnikController::class);
Route::get('/racuni', [RacunController::class, 'index'])->name('racuni.index');
Route::resource('racuni', RacunController::class);
##
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');

    // druge admin rute za korisnike (edit, delete) ako želiš
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});



Route::get('/racuni/chart', [RacunController::class, 'chart'])->name('racuni.chart');

##
Route::prefix('admin',)->group(function () {
    Route::get('/product', [ProductController::class, 'list'])->name('admin.product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/insert', [ProductController::class, 'insert'])->name('admin.product.insert');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
});

// Frontend routes
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/category/{id}', [ProductController::class, 'category'])->name('product.category');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

?>