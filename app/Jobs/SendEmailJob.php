<?php

namespace App\Jobs;

use App\Mail\SendEmailCoursesMail;
use App\Models\Student\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $name;
    private $course;
    private $url;
    public function __construct($name,$course,$url)
    {
        $this->name=$name;
        $this->course=$course;
        $this->url=$url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students= Student::select('email')->get();
        foreach ($students as $student){
            Mail::to($student->email)->send(new SendEmailCoursesMail($this->name,$this->course,$this->url));

        }
    }
}
