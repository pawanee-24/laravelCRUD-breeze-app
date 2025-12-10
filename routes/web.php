<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    // Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/save', [UserController::class, 'store'])->name('users.save');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories/save', [CategoriesController::class, 'store'])->name('categories.save');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');

    Route::get('/brands', [BrandsController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandsController::class, 'create'])->name('brands.create');
    Route::post('/brands/save', [BrandsController::class, 'store'])->name('brands.save');
    Route::get('/brands/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/update/{id}', [BrandsController::class, 'update'])->name('brands.update');
    Route::delete('/brands/delete/{id}', [BrandsController::class, 'delete'])->name('brands.delete');

});



require __DIR__.'/auth.php';
