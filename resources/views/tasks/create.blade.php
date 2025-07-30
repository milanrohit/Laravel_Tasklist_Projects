@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    {{$errors ?? ''}}
    <form action="{{ route('tasks.store') }}" method="POST" class="container py-5">
    @csrf
    <div class="card shadow-lg border-0 rounded-4 animate-fade-in task-card">
        <div class="card-header bg-gradient-primary text-white px-4 py-3 d-flex justify-content-between align-items-center animate-slide-down rounded-top">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle fs-4"></i>
                <h3 class="mb-0 fw-bold text-uppercase">Add New Task</h3>
            </div>
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-light">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card-body px-4 py-5">
            <div class="form-floating mb-4">
                <input type="text" name="title" id="title" class="form-control rounded-3 shadow-sm" placeholder="Task Title" required>
                <label for="title">📝 Task Title</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" name="description" id="description" class="form-control rounded-3 shadow-sm" placeholder="Short Description" required>
                <label for="description">📋 Short Description</label>
            </div>

            <div class="form-floating mb-5">
                <textarea name="long_description" id="long_description" class="form-control rounded-3 shadow-sm" placeholder="Long Description" style="height: 150px;"></textarea>
                <label for="long_description">📖 Long Description</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold animate-bounce">
                <i class="bi bi-check-circle me-2"></i> Create Task Now
            </button>
        </div>
    </div>
</form>
@endsection