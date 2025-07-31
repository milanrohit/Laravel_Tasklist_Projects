@extends('layouts.app')

@section('styles')
  <!-- Bootstrap & Icons -->
  @include('partials.cdn')
  <link rel="stylesheet" href="{{ asset('css/taskapp.css') }}">

@section('content')
<div class="container py-5">
    <div class="mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('tasks.show', $task) }}
            </ol>
        </nav>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h5 class="mb-0">Current Task Details</h5>
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-light">
                <i class="bi bi-arrow-right"></i> Back
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success m-3" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        @isset($task)
        <div class="card-body">
            <div class="mb-4 p-4 bg-light rounded shadow-sm border">
                <div class="d-flex align-items-center gap-3 mb-4 p-3 bg-white rounded shadow-sm border">
                    <div class="flex-shrink-0">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-check2-circle fs-4"></i>
                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <h5 class="fw-bold text-dark mb-1">
                            {{ $task->title }}
                        </h5>
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

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="text-secondary mb-2">Status</h6>
                        <span class="badge px-3 py-2 {{ $task->completed ? 'bg-success' : 'bg-warning text-dark' }}">
                            <i class="bi {{ $task->completed ? 'bi-check-circle-fill' : 'bi-hourglass-split' }}"></i>
                            {{ $task->completed ? 'Completed' : 'Pending' }}
                        </span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="text-secondary mb-2">Created At</h6>
                        <p class="mb-0 text-dark">
                            <i class="bi bi-calendar-plus me-1"></i>{{ $task->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="text-secondary mb-2">Updated At</h6>
                        <p class="mb-0 text-dark">
                            <i class="bi bi-calendar-check me-1"></i>{{ $task->updated_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @else
        <div class="card-body">
            <p class="text-muted">No task found.</p>
        </div>
        @endisset
    </div>
</div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #success-alert {
        transition: opacity 0.5s ease-in-out;
    }
</style>

<script>
    $(document).ready(function() {
        $('#success-alert').fadeOut(3000, function() {
            $(this).remove();
            window.location.href = "{{ route('tasks.index') }}";
        });
    });
</script>
