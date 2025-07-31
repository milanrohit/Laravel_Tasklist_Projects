<!DOCTYPE html>
<html lang="en">

<!-- Required Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        background: linear-gradient(to bottom right, #e0e7ff, #ede9fe);
        font-family: 'Segoe UI', sans-serif;
    }

    .card {
        transition: all 0.3s ease;
        border-radius: 1rem;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
    }

    .task-status {
        cursor: pointer;
        font-size: 0.875rem;
        padding: 0.4rem 0.75rem;
        border-radius: 1rem;
    }

    .task-actions a {
        font-size: 0.875rem;
        margin-right: 0.75rem;
        text-decoration: none;
    }

    .task-actions a:hover {
        text-decoration: underline;
    }

    .empty-state {
        background-color: #fff;
        border-radius: 2rem;
        padding: 2rem 3rem;
        box-shadow: 0 0 1rem rgba(0, 0, 0, 0.05);
    }
</style>

<body class="min-vh-100">
    <div class="container py-5">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-start mb-5">
            <div>
                <h1 class="display-5 fw-bold text-primary">📋 Task Dashboard</h1>
                <p class="lead text-muted">Track, manage, and update your tasks with ease.</p>
            </div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Add Task
            </a>
        </div>

        <!-- Tasks Section -->
        @if($tasks->count())
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($tasks as $task)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-primary">{{ $task->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($task->long_description, 80, '...') }}</p>
                        </div>
                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <div class="task-actions">
                                <a href="{{ route('tasks.show', $task->id) }}" class="text-primary">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </div>
                            <span class="badge {{ $task->completed ? 'bg-success' : 'bg-secondary' }} task-status"
                                  onclick="toggleStatus({{ $task->id }})">
                                {{ $task->completed ? 'Done' : 'Active' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center mt-5">
            <div class="empty-state mx-auto text-muted">
                <h4 class="mb-3">🚀 Ready to get productive?</h4>
                <p>No tasks found. Start by creating your first task!</p>
                <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary mt-3">
                    <i class="bi bi-plus-circle"></i> Create Task
                </a>
            </div>
        </div>
        @endif
    </div>

    <!-- Required Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>