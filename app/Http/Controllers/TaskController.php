<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TaskAssigned;

class TaskController extends Controller
{

    public function create(Project $project)
    {
        $users = User::all();
        
        return view('tasks.create', compact('project', 'users'));
    }

    
    public function store(Request $request, Project $project)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'assigned_user_id' => 'nullable|exists:users,id', 
        ]);
    
        $task =  Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'assigned_to' => $request->assigned_user_id,
            'project_id' => $project->id,
        ]);
       
        //$task->save();


        return redirect()->route('projects.show', $project->id)
                         ->with('success', 'Tâche créée avec succès !');
}

public function showAssignedTasks()
    {
       
        $tasks = Task::where('assigned_to', auth()->id())->get();
        
        
        $projects = Project::whereIn('id', $tasks->pluck('project_id'))->get();

        return view('notifications.index', compact('tasks', 'projects'));
    } 


}