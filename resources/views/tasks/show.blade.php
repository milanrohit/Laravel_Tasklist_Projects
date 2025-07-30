
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">🗂️ Tasks Show Page</h3>
            <div>
                <a href="{{ route('tasks.index') }}" class="btn btn-light btn-sm me-2">← Back</a>
            </div>
        </div>

        @if(isset($tasks))
        <div class="card-body">
            <h5 class="card-title">{{ $tasks->description }}</h5>
            <p class="card-text text-muted">{{ $tasks->long_description }}</p>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">
                    <strong>Status:</strong> 
                    <span class="badge {{ $tasks->completed ? 'bg-success' : 'bg-secondary' }}">
                        {{ $tasks->completed ? 'Completed' : 'Pending' }}
                    </span>
                </li>
                <li class="list-group-item">
                    <strong>Created At:</strong> {{ $tasks->created_at->format('Y-m-d H:i:s') }}
                </li>
                <li class="list-group-item">
                    <strong>Updated At:</strong> {{ $tasks->updated_at->format('Y-m-d H:i:s') }}
                </li>
            </ul>
        </div>
        @else
        <div class="card-body">
            <p class="text-muted">No task found.</p>
        </div>
        @endif
    </div>
</div>