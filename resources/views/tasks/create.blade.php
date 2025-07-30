@extends('layouts.app')

@section('title', 'Create Task')

@section('styles')
    <!-- Bootstrap & Animate.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .task-card {
            animation: fadeIn 0.5s ease-in;
        }
        .error-msg {
            font-size: 0.875rem;
            color: #dc3545;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
<form action="{{ route('tasks.store') }}" method="POST" class="container py-5">
    @csrf
    <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeIn task-card">
        <div class="card-header bg-primary text-white px-4 py-3 d-flex justify-content-end align-items-center rounded-top">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-light">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card-body px-4 py-5">
            <div class="mb-4">
                <label for="title" class="form-label">📝 Task Title</label>
                <input type="text" name="title" id="title" class="form-control rounded-3 shadow-sm" placeholder="Task Title" required>
                @error('title')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">📋 Short Description</label>
                <input type="text" name="description" id="description" class="form-control rounded-3 shadow-sm" placeholder="Short Description" required>
                @error('description')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="long_description" class="form-label">📖 Long Description</label>
                <textarea name="long_description" id="long_description" class="form-control rounded-3 shadow-sm" placeholder="Long Description" style="height: 150px;"></textarea>
                @error('long_description')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold animate__animated animate__bounce">
                <i class="bi bi-check-circle me-2"></i> Create Task Now
            </button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Simple frontend check before submission
        $('form').on('submit', function(e) {
            if (!$('#title').val().trim() || !$('#description').val().trim()) {
                alert('Please fill in all required fields!');
                e.preventDefault();
            }
        });
    </script>
@endsection