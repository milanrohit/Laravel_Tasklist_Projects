<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

/* Start project related routes */

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function (){
    return view('index', ['tasks' => \App\Models\Task::latest()->get()]);
})->name('tasks.index');

// Route to store a new task
Route::get('/tasks/create', function () {
    return view('create');
})->name('tasks.create');


Route::get('/tasks/{id}', function ($id) {
    return view('show', ['tasks' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');

?>