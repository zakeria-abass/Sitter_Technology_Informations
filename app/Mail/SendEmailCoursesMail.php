<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailCoursesMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin_dashboard.emails.SendEmailCourses')->with([
            'name'=>$this->name,
            'course'=>$this->course,
            'url'=>$this->url,

        ]);
    }
}
