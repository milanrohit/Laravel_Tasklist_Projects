<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Task Dashboard</title>

  <!-- Bootstrap & Icons -->
  @include('partials.cdn')
  <link rel="stylesheet" href="{{ asset('css/taskapp.css') }}">
</head>
<body class="min-vh-100">

  <div class="container py-5">
    <div class="mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('tasks.index') }}
            </ol>
        </nav>
    </div>

    <!-- Header -->
    <header class="dashboard-header px-4 py-4 mb-5 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-4">
      <div>
        <h1 class="h3 fw-bold text-primary">📋 Task Dashboard</h1>
        <p class="text-muted mb-0">Organize your tasks and boost productivity</p>
      </div>
      <div class="header-actions d-flex flex-column flex-sm-row gap-3">
        <div class="input-group shadow-sm">
          <span class="input-group-text bg-white border-end-0">
            <i class="bi bi-search text-muted"></i>
          </span>
          <input type="text" class="form-control border-start-0" placeholder="Search tasks..." aria-label="Search tasks">
        </div>
        <a href="{{ route('tasks.create') }}" class="btn btn-gradient btn-lg d-flex align-items-center gap-2 px-4 py-2 rounded-pill">
          <i class="bi bi-plus-circle-fill fs-5"></i>
          <span class="fw-semibold">Add Task</span>
        </a>
      </div>
    </header>

    <!-- Tasks -->
    @if($tasks->count())
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($tasks as $task)
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <h5 class="card-title text-primary">{{ $task->title }}</h5>
              <div class="progress my-2">
                <div class="progress-bar {{ $task->completed ? 'bg-success' : 'bg-warning' }}"
                     style="width: {{ $task->completed ? '100%' : '50%' }}"></div>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <div class="task-actions">
                <a href="{{ route('tasks.show', $task->id) }}" class="text-primary me-3">
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>