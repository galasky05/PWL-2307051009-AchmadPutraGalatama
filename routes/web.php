<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index'])->name('user.list');

Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/profile/{nama}/{kelas}/{npm}', [ProfileController::class, 'profile']);

Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/show/{id}', [UserController::class, 'show'])->name('users.show');




