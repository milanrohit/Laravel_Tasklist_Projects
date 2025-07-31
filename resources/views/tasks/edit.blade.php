@extends('layouts.app')

@section('styles')
    <!-- Bootstrap & Animate.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .task-card {
            animation: fadeIn 0.5s ease-in;
        }

        .error-msg {
            font-size: 0.875rem;
            color: #dc3545;
            font-weight: bold;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 600;
        }

        .form-label i {
            margin-right: 6px;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
@endsection

@section('content')
<div class="container py-5">
    <form action="{{ route('tasks.update', ['id' => $tasks->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeIn task-card">
            <div class="card-header bg-primary text-white px-4 py-3 d-flex justify-content-between align-items-center rounded-top">
                <h5><i class="bi bi-pencil-square me-2"></i>Edit Task</h5>
                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-light">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body px-4 py-5">
                <div class="mb-4">
                    <label for="title" class="form-label"><i class="bi bi-card-text"></i> Task Title</label>
                    <input type="text" name="title" id="title" value="{{ $tasks->title }}" class="form-control rounded-3 shadow-sm" placeholder="Enter task title" required>
                    @error('title')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label"><i class="bi bi-chat-left-text"></i> Short Description</label>
                    <input type="text" name="description" id="description" value="{{ $tasks->description }}" class="form-control rounded-3 shadow-sm" placeholder="Enter short description" required>
                    @error('description')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="long_description" class="form-label"><i class="bi bi-journal-text"></i> Long Description</label>
                    <textarea name="long_description" id="long_description" class="form-control rounded-3 shadow-sm" placeholder="Enter detailed description" style="height: 150px;">{{ $tasks->long_description }}</textarea>
                    @error('long_description')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold animate__animated animate__bounce">
                    <i class="bi bi-check-circle me-2"></i> Edit Task Now
                </button>
            </div>
        </div>
    </form>
</div>
@endsection