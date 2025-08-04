<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use config\constants;

class TaskController extends Controller
{
    // Show all tasks &  // Paginate tasks
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(9);
        return view('tasks.index', compact('tasks'));
    }

    // Show form to create a task
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => config('validation.req_chk_max25'),
            'description' => config('validation.req_chk_max25'),
            'long_description' => 'nullable|string',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    // Show single task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show form to edit task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task->update([
            'title' => $request->title,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
