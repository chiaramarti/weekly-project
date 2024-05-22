<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('projects', ProjectController::class);

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

Route::post('projects/{project}/tasks', [ProjectController::class, 'storeTask'])->name('projects.storeTask');
Route::post('tasks/{task}/toggle', [ProjectController::class, 'toggleTaskCompletion'])->name('tasks.toggle');
Route::delete('tasks/{task}', [ProjectController::class, 'destroyTask'])->name('tasks.destroy');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
