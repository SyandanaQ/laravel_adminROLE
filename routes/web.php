<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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

Route::middleware(['auth','is_admin'])->group(function () {
    // Rute untuk halaman Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Rute untuk Create, Edit dan Hapus User
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');  // Create user
    Route::post('/users', [UserController::class, 'store'])->name('users.store');  // Store user
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');  // Edit user
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');  // Update user
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');  // Hapus user

    // Rute untuk Category
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);

});

Route::resource('products', ProductController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
