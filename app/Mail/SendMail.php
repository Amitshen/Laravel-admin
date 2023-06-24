<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailConfig; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailConfig)
    {
        //
        $this->mailConfig = $mailConfig; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mailConfig['from_email'], $this->mailConfig['name'])
        ->subject($this->mailConfig['subject'])
        ->markdown('mails.mailTemplate');
    }
}
