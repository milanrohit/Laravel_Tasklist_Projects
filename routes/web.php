<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

// 404 Not Found route
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

/* Start project related routes */

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks/index', function (){
    return view('/tasks/index', ['tasks' => \App\Models\Task::latest()->get()]);
})->name('tasks.index');

// Route to store a new task
Route::get('/tasks/create', function () {
    return view('/tasks/create');
})->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id) {
    return view('/tasks/edit', ['tasks' => Task::findOrFail($id)]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
    return view('/tasks/show', ['tasks' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|string|max:50',
        'description' => 'required|string|max:50',
        'long_description' => 'required|string|max:50'
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',['id' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|string|max:50',
        'description' => 'required|string|max:50',
        'long_description' => 'required|string|max:50'
    ]);

    $task = Task ::findOrFail($id);
    if (!$task) {
        return redirect()->route('tasks.index')->with('error', 'Task not found!');
    }
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',['id' => $task->id])->with('success', 'Task Update successfully!');
})->name('tasks.update');