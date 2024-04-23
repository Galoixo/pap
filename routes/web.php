<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vinhosController;
use App\Http\Controllers\authController;

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

Route::get('/vinhos', [vinhosController::class, 'showVinhos']);
Route::get('/adicionar-produto', [vinhosController::class, 'create'])->middleware('auth');
Route::post('/vinhos', [vinhosController::class, 'store']);
Route::get('/vinhos/{id}', [vinhosController::class, 'show']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/home', function () {
    return view('admin.adminHome');
})->middleware(['auth', 'admin'])->name('admin.home');

Route::get('/admin/home', [vinhosController::class, 'dashboard'])->middleware('admin');
Route::get('/admin/edit/{id}', [vinhosController::class, 'edit'])->middleware('admin');
Route::put('/admin/update/{id}', [vinhosController::class, 'update'])->middleware('admin');
Route::delete('/admin/delete/{id}', [vinhosController::class, 'destroy'])->middleware('admin');
// route::put('/admin/update/{id}', [vinhosController::class, 'update'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [AuthController::class, 'checkUserType'])->name('home');
