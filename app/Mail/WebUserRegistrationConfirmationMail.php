<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WebUserRegistrationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $eventData;
    public $user;
    public $messageBody;

    public function __construct($eventData)
    {
        $this->user = $eventData->account;

        $this->messageBody = $eventData->body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //Attach EDM
        return $this->subject('N1DP account confirmation')
            ->view('emails.accounts.webUserRegistration');
    }
}
