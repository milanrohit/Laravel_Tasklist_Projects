<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

/* 🌐 Fallback Route for 404 Not Found */
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

/* 🚀 Project Routes */

// Redirect root to tasks index
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Display all tasks
Route::get('/tasks/index', function () {
    return view('tasks.index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

// Show form to create a new task
Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('tasks.create');

// Show form to edit a specific task
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('tasks.edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

// Show details of a specific task
Route::get('/tasks/{task}', function (Task $task) {
    return view('tasks.show', [
        'task' => $task
    ]);
})->name('tasks.show');

// Store a new task
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

// Update an existing task
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    
    // Ensure the task belongs to the authenticated user
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

// Delete a specific task
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');