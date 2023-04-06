<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditTaskAssignees extends Component
{
    
    public $users;
    public $assignees = [];
    public $task;
    public $updatedAssignees;
    public $task_id;

    public $role;

    protected $rules = [
        'assignees' => 'exists:users,id'
    ];

    public function mount(Task $task)
    {

        $this->users = User::role('assignee')->get();
        $this->assignees = $task->assignees->pluck('id')->toArray();
    }
    
    public function updateAssignees()
    {
        $this->validate();
        $selectedAssignees = $this->assignees;
        $task = Task::query()->firstWhere('id', $this->task_id);
        $task->assigner_id = Auth::id();
        $task->assignees()->sync($selectedAssignees);
        $task->save();
    }

    public function render()
    {
        return view('livewire.edit-task-assignees');
    }
}
