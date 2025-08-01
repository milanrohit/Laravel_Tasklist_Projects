@extends('layouts.app')

@section('styles')
    <!-- Bootstrap & Animate.css -->
    @include('partials.cdn')
    <link rel="stylesheet" href="{{ asset('css/taskapp.css') }}">
@endsection

@section('content')
    <div class="container py-5">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                {{ Breadcrumbs::render('tasks.edit', $task) }}
            </ol>
        </nav>
    </div>
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
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
                <!-- Form fields for task editing -->
                <div class="mb-4">
                    <label for="title" class="form-label"><i class="bi bi-card-text"></i> Task Title</label>
                    <input type="text" name="title" id="title" value="{{ $task->title }}" class="form-control rounded-3 shadow-sm" placeholder="Enter task title" required>
                    @error('title')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label"><i class="bi bi-chat-left-text"></i> Short Description</label>
                    <input type="text" name="description" id="description" value="{{ $task->description }}" class="form-control rounded-3 shadow-sm" placeholder="Enter short description" required>
                    @error('description')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="long_description" class="form-label"><i class="bi bi-journal-text"></i> Long Description</label>
                    <textarea name="long_description" id="long_description" class="form-control rounded-3 shadow-sm" placeholder="Enter detailed description" style="height: 150px;">{{ $task->long_description }}</textarea>
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
