<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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


// ГРУППЫ
// CRUD-операции - маршруты
// 1. На показ (GET)
Route::get('/groups', [GroupController::class, 'index'])->name('group.create');
// 2. На создание (POST)
Route::post('/groups', [GroupController::class, 'store'])->name('group.store');
// 3. На обновление (PUT/PATCH)
// Перекидывает нас на страницу с редактированием
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('group.edit');
// изменяет данные в полях таблицы users
Route::put('/groups/{group}', [GroupController::class, 'update'])->name('group.update');
// 4. На удаление (DELETE)
Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('group.destroy');

// СТУДЕНТЫ
// CRUD-операции - маршруты
// 1. На показ (GET)
Route::get('/students', [StudentController::class, 'index'])->name('student.create');
// 2. На создание (POST)
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
// 3. На обновление (PUT/PATCH)
// Перекидывает нас на страницу с редактированием
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
// изменяет данные в полях таблицы users
Route::put('/students/{student}', [StudentController::class, 'update'])->name('student.update');
// 4. На удаление (DELETE)
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('student.destroy');


// Предметы
// CRUD-операции - маршруты
// 1. На показ (GET)
Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.create');
// 2. На создание (POST)
Route::post('/subjects', [SubjectController::class, 'store'])->name('subject.store');
// 3. На обновление (PUT/PATCH)
// Перекидывает нас на страницу с редактированием
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
// изменяет данные в полях таблицы users
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subject.update');
// 4. На удаление (DELETE)
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');
