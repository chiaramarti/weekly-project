@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="mt-5">Projects</h1>
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
        </div>
        <ul class="list-group">
            @foreach ($projects as $project)
                @if (auth()->user()->id === $project->user_id)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                                <span class="ms-3 badge bg-primary">{{ $project->tasks->count() }}</span>
                            </div>
                            <div>
                                <span class="me-2">{{ $project->user->name }}</span>
                                <a href="{{ route('projects.edit', $project) }}"
                                    class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
