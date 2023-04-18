<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class GenerateRawDataReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $file = fopen(Storage::path('report/reports.csv'), 'wr');

        fputcsv($file, [
            'Title',
            'Description',
            'Due Date'
        ]);

        /** @var Task $product */
        foreach(Task::all() as $task) {

            fputcsv($file, [
                $task->title,
                $task->description,
                $task->due_date
            ]);

        }

        fclose($file);
    }
}
