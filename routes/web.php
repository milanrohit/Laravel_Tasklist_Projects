<?php
use Illuminate\Support\Facades\Route;
use App\Models\Task;

/* Start project related routes */

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function (){
    //return view('tasks.index', ['tasks' => \App\Models\Task::all()]);
    return view('tasks.index', ['tasks' => \App\Models\Task::latest()->get()]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    return view('tasks.show', ['tasks' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

?>