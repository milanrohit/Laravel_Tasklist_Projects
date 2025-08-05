<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\config\constants;


/* 🌐 Fallback Route for 404 Not Found */
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

/* 🚀 Home Route */
Route::get('/', function () {
    return view('tasks.index', [
        'tasks' => Task::latest()->paginate(9) // Paginate tasks for better performance
    ]);
})->name('tasks.home');

/* 📋 Task Routes */

// Index - Display all tasks (Controller-based)
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Index - Display all tasks (Closure-based, optional)
Route::get('/tasks/index', function () {
    return view('tasks.index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index.alt'); // Renamed to avoid route name conflict

// Create - Show form to create a new task
Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('tasks.create');

// Store - Save new task
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', config('constants.task_created'));
})->name('tasks.store');

// Show - Display a specific task
Route::get($route = config('constants.tasks_task'), function (Task $task) {
    return view('tasks.show', [
        'task' => $task
    ]);
})->name('tasks.show');

// Edit - Show form to edit a task
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('tasks.edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

// Update - Save changes to a task
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', config('constants.task_updated'));
})->name('tasks.update');
 
// Delete - Remove a task
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', config('constants.task_deleted'));
})->name('tasks.destroy');

// Toggle completed status of a task
Route::put('/tasks/{task}/toggle-completed', [TaskController::class, 'toggleCompleted'])
    ->name('tasks.toggle-completed');

