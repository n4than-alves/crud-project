<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Models\Task;
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

    // tasks
    Route::get('/tasks-index', [TaskController::class,'index'])->name('task.index');
    Route::get('/tasks-create', [TaskController::class,'create'])->name('task.create');
    Route::post('/tasks-store', [TaskController::class,'store'])->name('task.store');
    Route::get('/tasks-edit/{id}', [TaskController::class,'edit'])->name('task.edit');
    Route::put('/tasks-update/{id}',[TaskController::class,'update'])->name('task.update');
    Route::delete('/tasks/{id}',[TaskController::class,'destroy'])->name('task.destroy');
});



require __DIR__.'/auth.php';
