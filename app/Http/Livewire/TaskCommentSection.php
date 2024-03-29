<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskCommentSection extends Component
{
    public $task_id;
    public $comment;

    protected $rules = [
        'comment' => 'required',
        'task_id' => 'required|exists:tasks,id'
    ];

    public function addComment()
    {
        $this->validate();

        $comment = new Comment();
        $comment->body = $this->comment;
        $comment->task_id = $this->task_id;
        $comment->created_by_id = Auth::user()->id;

        $comment->save();
        
        $this->comment = '';
    }

    public function render()
    {
        $comments = Comment::where('task_id', $this->task_id)->orderBy('id','desc')->get();
    
        return view('livewire.task-comment-section', [
            'comments' => $comments
        ]);
    }
}
