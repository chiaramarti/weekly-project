@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->description }}</p>

        <h2>Tasks</h2>
        <div class="mb-3">
            @foreach ($tasks as $task)
                <div class="card mb-2 {{ $task->completed ? 'bg-light' : '' }}">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title {{ $task->completed ? 'text-muted' : '' }}">{{ $task->title }}</h5>
                            <p class="card-text {{ $task->completed ? 'text-muted' : '' }}">{{ $task->description }}</p>
                        </div>
                        <div>
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit"
                                    class="btn btn-sm btn-outline-secondary">{{ $task->completed ? 'Unmark' : 'Complete' }}</button>
                            </form>
                            @if ($task->completed)
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add Task Button -->
        <button class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#addTaskModal">+ Add Task</button>

        <!-- Add Task Modal -->
        <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tasks.store', $project) }}" method="POST" id="taskForm">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back to Projects</a>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
