<body class="min-h-screen bg-gradient-to-br from-indigo-100 to-purple-100">
    <div class="min-h-screen px-6 py-10">
        <header class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-5xl font-extrabold text-indigo-700">🏠 Home Dashboard</h1>
                <p class="text-lg text-gray-700 mt-2">Welcome! Here’s an overview of your tasks and activities.</p>
            </div>
            <a href="#" class="bg-indigo-500 text-white font-semibold px-6 py-3 rounded-full shadow hover:bg-indigo-600 transition">
                ➕ Add Task
            </a>
        </header>

        @if($tasks->count())
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($tasks as $task)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition p-6 flex flex-col justify-between border border-indigo-100">
                <div>
                    <h3 class="text-2xl font-bold text-indigo-800">{{ $task->title }}</h3>
                    <p class="text-base text-gray-600 mt-2">{{ Str::limit($task->long_description, 80, '...') }}</p>
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <a href="{{ route('tasks.show', $task->id) }}" class="text-indigo-600 hover:underline font-medium text-sm">Details →</a>
                    <span onclick="toggleStatus({{ $task->id }})"
                                class="cursor-pointer px-4 py-1 rounded-full text-xs font-semibold transition 
                                             {{ $task->completed ? 'bg-green-400 text-white hover:brightness-110' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }}">
                        {{ $task->completed ? 'Done' : 'Active' }}
                    </span>
                </div>
            </div>
            @endforeach
        </section>
        @else
        <div class="mt-16 text-center">
            <div class="inline-block bg-indigo-100 border border-indigo-300 text-indigo-800 px-8 py-6 rounded-xl shadow">
                <strong>Welcome!</strong> No tasks yet. <a href="#" class="text-indigo-600 underline font-medium">Create your first task</a> to get started.
            </div>
        </div>
        @endif
    </div>

    <script>
        function toggleStatus(taskId) {
            alert(`Interactive: You clicked status for Task #${taskId}. Time to hook up that AJAX magic!`);
        }
    </script>
</body>