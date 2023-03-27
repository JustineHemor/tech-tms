<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->created_by_id = Auth::id();
        $task->save();

        $assignees = $request->input('assignee');

        $task->assignees()->attach($assignees);

        return redirect()->to('tasks')->with('success', 'Task successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $users = User::all();
        $assignees = $task->assignees->pluck('id')->toArray();
        $date = $task->created_at->format('F j, Y g:i A');
        return view('tasks.view', compact('task', 'users', 'assignees', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $assignees = $task->assignees->pluck('id')->toArray();
        return view('tasks.edit', compact('task', 'users', 'assignees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');

        $task->save();
        $task->assignees()->sync($request->input('assignee'));

        return redirect()->to('tasks')->with('success', 'Task successfully updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
