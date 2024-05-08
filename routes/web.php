<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vinhosController;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\carrinhoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vinhos', [vinhosController::class, 'showVinhos'])->name('showVimhos');
Route::get('/adicionar-produto', [adminController::class, 'create'])->middleware('admin')->name('createProduct');
Route::post('/vinhos', [vinhosController::class, 'store'])->name('vinhos');
Route::get('/vinhos/show/{id}', [VinhosController::class, 'show'])->name('vinhos.show');
Route::get('/produto', [vinhosController::class, 'filter'])->name('vinhosFiltro');
Route::get('/vinhos/{id}',[carrinhoController::class, 'addCarrinho'])->name('addCarrinho');
Route::get('/carrinho',[carrinhoController::class, 'carrinho'])->name('carrinho');
Route::get('/remover-produto',[carrinhoController::class, 'deleteProduct'])->name('remover.produto');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/home', [adminController::class, 'dashboard'])->name('admin.home');
        Route::get('/edit/{id}', [adminController::class, 'edit']);
        Route::put('/update/{id}', [adminController::class, 'update']);
        // Route::put('/update/{id}', [adminController::class, 'validateAnoColheita'])->name('admin.validateAnoColheita');
        Route::delete('/delete/{id}', [adminController::class, 'destroy']);
        Route::get('/search', [adminController::class, 'search'])->name('admin.search');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [authController::class, 'checkUserType'])->name('home');
