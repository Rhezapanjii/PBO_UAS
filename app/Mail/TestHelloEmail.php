<?php

namespace app\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\TestSendEmail;


class TestHelloEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * 
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * 
     */
    public function build()
    {
        return $this->view('mail.testEmails');
    }
}
