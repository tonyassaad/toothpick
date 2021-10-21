<?php

namespace App\Listeners;

use App\Events\AccountCreatedEvent;
use App\Mail\UserRegistrationConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AccountCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AccountCreatedEvent $event)
    {
        $message = new UserRegistrationConfirmationMail($event);
        Mail::to($event->account->email)->queue($message);
    }
}
