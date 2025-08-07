<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use config\constants;
use App\Http\Requests\TaskRequest;

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
        // Create an empty Task instance
        return view('tasks.create', compact('task'));
    }

    // Store a new task
    public function store(TaskRequest $request)
    {
        // Validate request data
        $validated = $request->validate([
            'title' => config('constants.validation.req_chk_max25'), // This ensures 'title' is required and max 255 characters
            'description' => config('constants.validation.req_chk_max25'), // This ensures 'description' is not null
            'long_description' => config('constants.validation.req_chk_max25'),
            'completed' => 'sometimes|boolean',
        ]);

        // Create the task using validated data
        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'long_description' => $validated['long_description'],
            'completed' => $validated['completed'] ?? false, // default to false if not provided
        ]);

        // Redirect to show page for better UX
        return redirect()->route('tasks.show', $task->id)
            ->with('success', config('constants.task_created'));
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
            'title' => config('constants.validation.req_chk_max25'),
            'description' => config('constants.validation.req_chk_max25'),
            'long_description' => config('constants.validation.req_chk_max25'),
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description ?? $task->description, // fallback to existing value
            'long_description' => $request->long_description ?? $task->long_description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }


    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    // In TaskController.php
    public function toggleCompleted(Task $task)
    {
        $task->toggleStatus();

        return redirect()->route('tasks.home')
            ->with('success', config('constants.task_completed'));
    }
}
