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
                @isset($task)
                    {{ Breadcrumbs::render('tasks.show', $task) }}
                @else
                    {{ Breadcrumbs::render('tasks.create') }}
                @endisset
            </ol>
        </nav>

        {{-- Main Task Form --}}
        <form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
            @csrf
            @if(isset($task))
                @method('PUT')
            @endif

            <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeIn task-card">
                <div class="card-header bg-primary text-white px-4 py-3 d-flex justify-content-between align-items-center rounded-top">
                    <h5>
                        <i class="bi bi-pencil-square me-2"></i>
                        @isset($task) Edit Task Now @else Create Task Now @endisset
                    </h5>
                    <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>

                <div class="card-body px-4 py-5">
                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title" class="form-label">
                            <i class="bi bi-card-text"></i> Task Title
                        </label>
                        <input type="text" name="title" id="title"
                            value="{{ old('title', $task->title ?? '') }}"
                            class="form-control rounded-3 shadow-sm"
                            placeholder="Enter task title" required>
                        @error('title')
                            <div class="error-msg" id="div_title">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- Short Description --}}
                    <div class="mb-4">
                        <label for="description" class="form-label">
                            <i class="bi bi-chat-left-text"></i> Short Description
                        </label>
                        <input type="text" name="description" id="description" value="{{ $task->description ?? old('description') }}" class="form-control rounded-3 shadow-sm" placeholder="Enter short description" required>
                        @error('description')
                            <div class="error-msg" id="div_description">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Long Description --}}
                    <div class="mb-5">
                        <label for="long_description" class="form-label">
                            <i class="bi bi-journal-text"></i> Long Description
                        </label>
                        <textarea name="long_description" id="long_description" class="form-control rounded-3 shadow-sm" placeholder="Enter detailed description">{{ $task->long_description ?? old('long_description') }}</textarea>
                        @error('long_description')
                            <div class="error-msg" id="div_long_description">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold animate__animated animate__bounce">
                        <i class="bi bi-check-circle me-2"></i>
                        @isset($task) Edit Task Now @else Create Task Now @endisset
                    </button>
                </div>
            </div>
        </form>

        {{-- Task Status Section --}}
        @isset($task)
        <div class="card mt-4 shadow-sm border-0 rounded-4 animate__animated animate__fadeIn">
            <div class="card-body px-4 py-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <label for="toggleBtn" class="form-label mb-0">
                        <i class="bi bi-check-circle me-1"></i> Task Status
                    </label>

                    {{-- Toggle Completed Button Component --}}
                    <x-toggle-completed-button :task="$task" />
                </div>
            </div>
        </div>
        @endisset

    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('js/taskapp.js') }}"></script>
@endsection
