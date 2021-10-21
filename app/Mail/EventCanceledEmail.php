<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventCanceledEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $canceledEvent;

    public function __construct($canceledEvent)
    {
        $this->canceledEvent = $canceledEvent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Cancellation of Event')->to($this->canceledEvent->email)->view('emails.events.event-canceled',
        ['event_start_date'=>Carbon::parse($this->canceledEvent->start_date)->format('l jS  F Y'),
          'event_end_date'=>Carbon::parse($this->canceledEvent->end_date)->format('l jS  F Y'),
            'canceled_event_start_time'=>Carbon::parse($this->canceledEvent->start_time)->format('H:i'),
        'canceled_event_end_time'=>Carbon::parse($this->canceledEvent->end_time)->format('H:i'), ]
    );
    }
}
