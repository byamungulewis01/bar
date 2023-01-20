<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $key;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($key,$email)
    {
        $this->key = $key;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.resetPassword')
            ->subject("Password Reset");
    }
}
