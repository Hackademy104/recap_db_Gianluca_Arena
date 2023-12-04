<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PublicController;

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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

// Games routes
Route::get('/games/create', [GameController::class, 'create'])->name('create');
Route::post('/games/store', [GameController::class, 'store'])->name('store');
Route::get('/games/index', [GameController::class, 'index'])->name('index');
Route::get('/games/show/{game}', [GameController::class, 'show'])->name('show');
Route::get('/games/edit/{game}', [GameController::class, 'edit'])->name('edit');
Route::put('/games/update/{game}', [GameController::class, 'update'])->name('update');
Route::delete('/games/delete/{game}', [gameController::class, 'delete'])->name('delete');