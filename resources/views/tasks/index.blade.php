
<!-- Required Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: linear-gradient(to bottom right, #e0e7ff, #ede9fe);
    }
    .card:hover {
        box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.15);
    }
    .task-status {
        cursor: pointer;
    }
</style>

<body class="min-vh-100">
    <div class="container py-5">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-start mb-5">
            <div>
                <h1 class="display-4 fw-bold text-primary">🏠 Home Task Dashboard</h1>
                <p class="lead text-muted">Welcome! Here’s an overview of your tasks and activities.</p>
            </div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary shadow-sm">
                ➕ Add Task
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
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-decoration-none text-primary">Details →</a>
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
            <div class="alert alert-info d-inline-block px-5 py-4 rounded-pill shadow-sm">
                <strong>Welcome!</strong> No tasks yet. <a href="{{ route('tasks.create') }}" class="alert-link">Create your first task</a> to get started.
            </div>
        </div>
        @endif
    </div>

    <!-- Required Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>