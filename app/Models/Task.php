<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    // protected array $casts = [
    //     'due_date' => 'date:Y-m-d',
    //     'completed_at' => 'datetime',
    // ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by_id');
    }

    public function assignees()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function assigner()
    {
        return $this->belongsTo(User::class, 'assigner_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function taskAssignees($task, $assignees)
    {
        if (empty($assignees)) {
            return;
        }
        $task->assigner_id = Auth::id();
        $task->assignees()->attach($assignees);
        $task->save();

        return;
    }
}
