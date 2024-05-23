<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $project->tasks()->create($request->all());

        return redirect()->route('projects.show', $project)
            ->with('success', 'Task created successfully.');
    }

    public function toggle(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->route('projects.show', $task->project)
            ->with('success', 'Task status updated successfully.');
    }

    public function destroy(Task $task)
    {
        $project = $task->project;
        $task->delete();

        return redirect()->route('projects.show', $project)
            ->with('success', 'Task deleted successfully.');
    }
}
