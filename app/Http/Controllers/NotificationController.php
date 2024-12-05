<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class NotificationController extends Controller
{
    
    public function index()
    {
        
        $tasks = Task::where('assigned_to', auth()->id()) 
                     ->with('project') 
                     ->get();
        return view('notifications.index', compact('tasks'));
    }

}

