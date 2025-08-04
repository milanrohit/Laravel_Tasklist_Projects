@extends('layouts.app')

@section('styles')
    @include('partials.cdn')
    <link rel="stylesheet" href="{{ asset('css/taskapp.css') }}">
@endsection

@section('content')
    @include('tasks.form',['task' => isset($task) ? $task : null])
@endsection

@section('scripts')
    <script src="{{ asset('js/taskapp.js') }}"></script>
@endsection