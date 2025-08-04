@extends('layouts.app')

@section('styles')
    <!-- Bootstrap & Animate.css -->
    @include('partials.cdn')
    <link rel="stylesheet" href="{{ asset('css/taskapp.css') }}">
@endsection

@section('content')
    @include('tasks.form')
@endsection

@section('scripts')
    <script src="{{ asset('js/taskapp.js') }}"></script>
@endsection