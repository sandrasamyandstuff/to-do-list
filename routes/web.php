<?php

use App\Http\Controllers\authcontroller;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\Method;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\TasksController;







Route::middleware(['auth'])->group(function () {
    Route::get('/', [TasksController::class, 'index'])->name('home');
    Route::get('index', [TasksController::class, 'index'])->name('index');
    Route::get('showcomplete', [TasksController::class, 'showcomplete'])->name('showcomp');
    Route::get('showincomplete', [TasksController::class, 'showincomplete'])->name('showincomp');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['guest'])->group(function () {

    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::get('register', [AuthController::class, 'registerForm'])->name('register');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

});




    Route::get('/tasks/create', [TasksController::class, 'create'])->name('create');
    Route::post('/tasks/create', [TasksController::class, 'store'])->name('store');

Route::get('/tasks/{task}/edit', [TasksController::class, 'edit'])->name('edit');
Route::put('/tasks/{task}', [TasksController::class, 'update'])->name('update');

Route::patch('/tasks/{task}/complete', [TasksController::class, 'complete'])->name('complete');
Route::patch('/tasks/{task}/incomplete', [TasksController::class, 'incomplete'])->name('incomplete');


Route::delete('/tasks/delete/{task}', [TasksController::class, 'destroy'])->name('destroy');






