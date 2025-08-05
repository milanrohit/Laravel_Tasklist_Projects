<form action="{{ route('tasks.toggle-completed', ['task' => $task]) }}" method="POST" class="d-inline">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-outline-success" id="toggleBtn">
        <i class="bi bi-check2-circle me-1"></i>
        <span>
            {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Completed' }}
        </span>
    </button>
</form>
