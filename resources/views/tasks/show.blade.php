@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h5 class="mb-0">Create Task</h5>
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-light">
                <i class="bi bi-arrow-right"></i> Back
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success m-3" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        @if(isset($tasks))
        <div class="card-body">
            <h5 class="card-title">{{ $tasks->description }}</h5>
            <p class="card-text text-muted">{{ $tasks->long_description }}</p>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">
                    <strong>Status:</strong> 
                    <span class="badge {{ $tasks->completed ? 'bg-success' : 'bg-secondary' }}">
                        {{ $tasks->completed ? 'Completed' : 'Pending' }}
                    </span>
                </li>
                <li class="list-group-item">
                    <strong>Created At:</strong> {{ $tasks->created_at->format('Y-m-d H:i:s') }}
                </li>
                <li class="list-group-item">
                    <strong>Updated At:</strong> {{ $tasks->updated_at->format('Y-m-d H:i:s') }}
                </li>
            </ul>
        </div>
        @else
        <div class="card-body">
            <p class="text-muted">No task found.</p>
        </div>
        @endif
    </div>
</div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    #success-alert {
        transition: opacity 0.5s ease-in-out;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#success-alert').fadeOut(3000, function() {
            $(this).remove();
            window.location.href = "{{ route('tasks.index') }}";
        });
    });
</script>