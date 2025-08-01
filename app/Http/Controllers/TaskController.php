<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskController extends Controller
{
    // Show all tasks &  // Paginate tasks
    public function index()
    {
        $tasks = Task::paginate(9); // ✅ Use paginate instead of get()
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
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
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

    // Toggle status
    public function toggleStatus(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();

        return response()->json(['status' => 'success']);
    }

}
