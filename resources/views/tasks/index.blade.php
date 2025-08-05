@extends('layouts.app') {{-- Optional: if you're using a layout --}}

@section('styles')
    <!-- Bootstrap & Animate.css -->
    @include('partials.cdn')
    <link rel="stylesheet" href="{{ asset('css/taskapp.css') }}">
@endsection

@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
<div class="container py-5">

  <!-- ✅ Header -->
  <header class="dashboard-header px-4 py-4 mb-5 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-4 bg-white rounded shadow-sm">
    <div class="flex-grow-1">
      <h1 class="h3 fw-bold text-primary mb-1">📋 Task Dashboard</h1>
      <p class="text-muted mb-0">Organize your tasks and boost productivity</p>
    </div>
    <div class="header-actions">
      <a href="{{ route('tasks.create') }}" class="btn btn-gradient btn-lg d-flex align-items-center gap-2 px-4 py-2 rounded-pill">
        <i class="bi bi-plus-circle-fill fs-5"></i>
        <span class="fw-semibold">Add Task</span>
      </a>
    </div>
  </header>

  <!-- ✅ Task List -->
  @if($tasks->count())
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" aria-live="polite">
      @foreach($tasks as $task)
        <div class="col">
          <div class="card h-100 shadow-sm border-0 rounded-3">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5 class="card-title text-primary">{{ $task->title }}</h5>
              <div class="progress my-2" style="height: 6px;">
                <div class="progress-bar {{ $task->completed ? 'bg-success' : 'bg-warning' }}"
                      style="width: {{ $task->completed ? '100%' : '50%' }}"></div>
              </div>
              <div class="mt-3 d-flex flex-wrap justify-content-between align-items-center">
                <!-- ✅ Task Actions -->
                <div class="task-actions d-flex flex-wrap align-items-center gap-2 gap-md-3">
                  <a href="{{ route('tasks.show', $task->id) }}"
                     class="btn btn-outline-primary d-flex align-items-center px-3 py-2 fw-semibold"
                     style="border-radius: 0.5rem;"
                     aria-label="View Task {{ $task->title }}">
                    <i class="bi bi-eye me-2"></i> View
                  </a>
                  <a href="{{ route('tasks.edit', $task->id) }}"
                     class="btn btn-outline-warning d-flex align-items-center px-3 py-2 fw-semibold"
                     style="border-radius: 0.5rem;"
                     aria-label="Edit Task {{ $task->title }}">
                    <i class="bi bi-pencil-square me-2"></i> Edit
                  </a>
                  <form action="{{ route('tasks.destroy', $task->id) }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-outline-danger d-flex align-items-center px-3 py-2 fw-semibold"
                            style="border-radius: 0.5rem;"
                            aria-label="Delete Task {{ $task->title }}">
                      <i class="bi bi-trash me-2"></i> Delete
                    </button>
                  </form>
                </div>
              </div>
            </div>
          <!-- ✅ Status Badge -->
            <button class="badge {{ $task->completed ? 'bg-success' : 'bg-secondary' }} task-status"
                    onclick="toggleStatus({{ $task->id }})"
                    aria-label="Toggle status for task {{ $task->title }}">
              {{ $task->completed ? 'Done' : 'Active' }}
            </button>
          </div>
        </div>
      @endforeach
    </div>

    <!-- ✅ Pagination -->
    <div class="mt-4 d-flex justify-content-center">
      {{ $tasks->links('pagination::bootstrap-5') }}
    </div>
  @else
    <!-- ✅ Empty State -->
    <div class="text-center mt-5">
      <div class="empty-state mx-auto text-muted">
        <h4 class="mb-3">🚀 Ready to get productive?</h4>
        <p>No tasks found. Start by creating your first task!</p>
        <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary mt-3 d-inline-flex align-items-center gap-2">
          <i class="bi bi-plus-circle"></i> Create Task
        </a>
      </div>
    </div>
  @endif

</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/taskapp.js') }}"></script>
@endsection
