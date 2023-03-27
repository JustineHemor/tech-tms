<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $fillable = [
    //             'title', 
    //             'description', 
    //             'due_date', 
    //             'completed_at', 
    //             'completed_by', 
    //             'created_by'
    //         ];

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
}
