@extends('layouts.app')
@section('title', 'Add Task')
@section('content')
    <form action="{{ route('tasks.store') }}" method="POST" class="container py-5">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">➕ Add New Task</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Task Description</label>
                    <input type="text" name="description" id="description" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="long_description" class="form-label">Long Description</label>
                    <textarea name="long_description" id="long_description" rows="4" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </div>
    </form>