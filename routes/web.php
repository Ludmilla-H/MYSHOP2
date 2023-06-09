<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('welcome');
//filtre par categorie
Route::get('/filtre/{categorie}', [ProductController::class, 'index'])->name('welcome.categorie');

Route::get('/detail/{product}', [ProductController::class, 'detail'])->name('welcome.detail');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ne peuvent ajouter au panier que les utilisateur connecté
    Route::get('/add/{product}', [CartController::class, 'add'])->name('addToCart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
});

require __DIR__.'/auth.php';


