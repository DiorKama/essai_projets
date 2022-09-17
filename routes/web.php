<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/produits',  [ProduitController::class, 'index'])->middleware(['auth'])->name('produits');
Route::get('/ajoutProduit',  [ProduitController::class, 'create'])->middleware(['auth'])->name('ajoutProduit');
Route::post('/ajoutProduit',  [ProduitController::class, 'store'])->middleware(['auth'])->name('ajoutProduit');





