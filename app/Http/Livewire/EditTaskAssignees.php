<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class EditTaskAssignees extends Component
{
    public $users;
    public $assignees = [];
    public $task;
    public $updatedAssignees;
    public $task_id;

    public function mount(Task $task)
    {
        $this->users = User::all();
        $this->assignees = $task->assignees->pluck('id')->toArray();
    }
    
    public function updateAssignees()
    {
        $selectedAssignees = $this->assignees;
        $task = Task::query()->firstWhere('id', $this->task_id);
        $task->assignees()->sync($selectedAssignees);
    }

    public function render()
    {
        return view('livewire.edit-task-assignees');
    }
}
