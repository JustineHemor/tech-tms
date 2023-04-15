<?php

namespace App\Listeners;

use App\Events\TaskStored;
use App\Mail\NewTaskMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoreTask
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskStored $event): void
    {
        $task = $event->task;

        $user = Auth::user();

        $data = [
            'subject' => 'Task Posted - ' . $task->title,
            'body' => 'The task you created just posted. Description: ' . $task->description
        ];
        Mail::to($user->email)->send(new NewTaskMail($data));
    }
}
