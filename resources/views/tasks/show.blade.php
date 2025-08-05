@extends('layouts.app')

@section('styles')
    <!-- Bootstrap & Icons -->
    @include('partials.cdn')
    <link rel="stylesheet" href="{{ asset('css/taskapp.css') }}">
@endsection

@section('content')
<div class="container py-5">
  {{-- Breadcrumb Navigation --}}
  <div class="mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">{{ Breadcrumbs::render('tasks.show', $task) }}</ol>
    </nav>
  </div>

  {{-- Task Card --}}
  <div class="card shadow rounded-3 border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
      <h5 class="mb-0">📝 Current Task Details</h5>
      <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-light" aria-label="Back to Task List">
        <i class="bi bi-arrow-left"></i> Back
      </a>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
      <div class="alert alert-success m-3 fade show" id="success_alert" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @isset($task)
    
    <div class="card-body">
      {{-- Task Overview --}}
      <div class="mb-4 p-4 bg-light rounded shadow-sm border">
        <div class="d-flex align-items-center gap-3 mb-4 p-3 bg-white rounded shadow-sm border">
          <div class="flex-shrink-0">
            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
              <i class="bi bi-check2-circle fs-4"></i>
            </div>
          </div>
          <div class="flex-grow-1">
            <h5 class="fw-bold text-dark mb-1">{{ $task->title }}</h5>
            <span class="badge bg-info text-white px-3 py-1 rounded-pill">Task Overview</span>
          </div>
        </div>

        <div class="ps-5">
          <p class="fs-5 text-dark mb-2">
            <i class="bi bi-chat-left-text me-2 text-secondary"></i>{{ $task->description }}
          </p>
          <p class="text-muted fst-italic">
            <i class="bi bi-journal-text me-2 text-secondary"></i>{{ $task->long_description }}
          </p>
        </div>
      </div>

      {{-- Task Metadata --}}
      <div class="row g-4">
        <div class="col-md-4">
          <div class="border rounded p-3 bg-light h-100">
            <h6 class="text-secondary mb-2">📌 Task Status</h6>
            <span class="badge px-3 py-2 {{ $task->completed ? 'bg-success' : 'bg-warning text-dark' }}">
              <i class="bi {{ $task->completed ? 'bi-check-circle-fill' : 'bi-hourglass-split' }}"></i>
              {{ $task->completed ? 'Completed' : 'Pending' }}
            </span>
          </div>
        </div>

        <div class="col-md-4">
          <div class="border rounded p-3 bg-light h-100">
            <h6 class="text-secondary mb-2">📅 Created At</h6>
            <p class="mb-0 text-dark">
              <i class="bi bi-calendar-plus me-1"></i>{{ $task->created_at->format('d M Y, H:i') }}
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="border rounded p-3 bg-light h-100">
            <h6 class="text-secondary mb-2">🔄 Updated At</h6>
            <p class="mb-0 text-dark">
              <i class="bi bi-calendar-check me-1"></i>{{ $task->updated_at->format('d M Y, H:i') }}
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Footer Actions --}}
    <div class="card-footer bg-white px-4 py-3 d-flex justify-content-end gap-2 rounded-bottom shadow-sm">
      
      {{-- Start Toggle Completed Button --}}
        <x-toggle-completed-button :task="$task" />
      {{-- End Toggle Completed Button --}}

      {{-- Edit Button --}}
      <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-primary d-flex align-items-center px-3 py-2 text-decoration-none" aria-label="Edit Task">
        <i class="bi bi-pencil-square me-2"></i> Edit
      </a>

      {{-- Delete Button --}}
      <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger d-flex align-items-center px-3 py-2" aria-label="Delete Task">
          <i class="bi bi-trash me-2"></i> Delete
        </button>
      </form>
    </div>

    @else
    
    <div class="card-body">
      <p class="text-muted">No task found.</p>
    </div>
    @endisset
  </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/taskapp.js') }}"></script>
@endsection
