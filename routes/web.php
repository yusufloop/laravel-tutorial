<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/task', function () {
    return view('task');
})->name('task');


Route::get('/', [TaskController::class , 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store' ])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::patch('tasks/{task}/toggle', [TaskController::class, 'toggleCompletion'])->name('tasks.toggleCompletion');
