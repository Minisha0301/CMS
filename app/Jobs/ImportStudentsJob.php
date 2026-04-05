<?php

namespace App\Jobs;

use App\Imports\StudentsImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class ImportStudentsJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $filePath;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath)
    {
         $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         $fullPath = Storage::path($this->filePath);
         Excel::import(new StudentsImport, $fullPath);
    }
}
