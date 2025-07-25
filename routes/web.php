<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

//category
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/create', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/categories/delete/{category}', [CategoryController::class, 'distroy'])->name('category.delete');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/categories/edit/{category}', [CategoryController::class, 'update'])->name('category.update');

//auth
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register.index');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

//todo
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'todo',
    'as' => 'todo.'
], function () {
    Route::get('/', [TodoController::class, 'index'])->name('index');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/create', [TodoController::class, 'store'])->name('store');
    Route::get('/show/{todo}', [TodoController::class, 'show'])->name('show');
    Route::get('/edit/{todo}', [TodoController::class, 'edit'])->name('edit');
    Route::post('/update/{todo}', [TodoController::class, 'update'])->name('update');
    Route::get('/completed/{todo}', [TodoController::class, 'completed'])->name('completed');
    Route::delete('/delete/{todo}', [TodoController::class, 'destroy'])->name('destroy');
});
