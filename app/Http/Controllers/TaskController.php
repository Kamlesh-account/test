<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('completed', false)->get();
        return view('tasks.index', compact('tasks'));   
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tasks|max:255',
        ]);

        $task = Task::create([
            'title' => $request->title,
        ]);

        return response()->json($task);
    }

    public function complete(Task $task)
    {
        $task->update(['completed' => true]);

        return response()->json(['success' => true]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['success' => true]);
    }

    public function showAll()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }
}