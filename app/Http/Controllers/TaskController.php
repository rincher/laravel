<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
	public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Task::create([
            'title' => $request->title
        ]);

        return redirect('/');
    }

    public function toggle($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect('/');
    }
}

