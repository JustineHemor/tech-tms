<?php

namespace App\Actions;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateTask
{
    use AsAction;

    public function handle(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->created_by_id = Auth::id();

        $task->save();

        $task->taskAssignees($task, $request->input('assignee'));

        return $task;
    }
}
