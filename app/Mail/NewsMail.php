<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $body;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $body, $subject)
    {
        $this->name = $name;
        $this->body = $body;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.emails.news');
    }
}
