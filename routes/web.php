<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// CRUD-операции - маршруты
// 1. На показ (GET)
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// 2. На создание (POST)
Route::post('/users', [UserController::class, 'store'])->name('users.store');
// 3. На обновление (PUT/PATCH)
// Перекидывает нас на страницу с редактированием
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// изменяет данные в полях таблицы users
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// 4. На удаление (DELETE)
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
