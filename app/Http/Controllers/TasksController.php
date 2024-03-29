<?php

namespace App\Http\Controllers;

use App\Actions\CreateTask;
use App\Events\TaskStored;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Jobs\GenerateRawDataReport;
use Spatie\Permission\Traits\HasRoles;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HasRoles;

    public function index()
    {
        // $tasks = Task::latest()->paginate(10);
        $tasks = Task::orderBy('id', 'desc')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        /** @var User $user */ 
        $user = Auth::user();
        if ($user->hasAnyRole(['manager', 'creator'])) {
            $users = User::role('assignee')->get();
            return view('tasks.create', compact('users'));
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        // Instatiate the CreateTask class
        $createTask = new CreateTask();

        // Call the handle method of the CreateTask class and pass the request object
        $task = $createTask->handle($request);

        event(new TaskStored($task));

        return redirect('/tasks/'.$task->id)->with('success', 'Task successfully created!');
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
        /** @var User $user */ 
        $user = Auth::user();
        if ($user->hasAnyRole(['manager', 'creator'])) {
            return view('tasks.edit', compact('task'));
        } else {
            return back();
        }
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

        return redirect()->to('tasks')->with('success', 'Task successfully updated!');  
    }

    /**
     * Mark a task as completed.
     */
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed_by_id = Auth::id();
        $task->completed_at = now();
        $task->save();

        return redirect('/tasks/'.$task->id)->with('success', 'Task completed!');

    }

    /**
     * Reopen task.
     */
    public function reopen($id)
    {
        $task = Task::findOrFail($id);
        $task->completed_by_id = null;
        $task->completed_at = null;
        $task->save();

        return redirect('/tasks/'.$task->id)->with('success', 'Task reopened!');
    }

    /**
     * Generate Raw Data Report CSV File.
     */
    public function generate()
    {
        GenerateRawDataReport::dispatch();

        return redirect()->to('tasks')->with('success', 'Reports generating! Please wait a few seconds.');  
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
