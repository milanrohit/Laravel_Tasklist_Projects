<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/task-style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- 🧭 Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-rocket-takeoff me-2"></i>TaskMaster
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('tasks.index') }}" class="nav-link">Tasks</a></li>
                    <li class="nav-item"><a href="{{ route('tasks.create') }}" class="nav-link">Add Task</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🧾 Main Content -->
    <main class="py-5 container">
        @yield('content')
    </main>

    <!-- 👣 Footer -->
    <footer class="text-center text-muted py-4 small">
        &copy; {{ date('Y') }} TaskMaster · All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS (optional) -->
    <script src="{{ asset('js/task-script.js') }}" defer></script>
</body>
</html>