<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CoachAssigneEvent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $coach;
    public $assignedEvent;

    public function __construct($coach, $assignedEvent)
    {
        $this->coach = $coach;
        $this->assignedEvent = $assignedEvent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->coach->email)
            ->subject("An Event has been allocated to {$this->coach->first_name}")
            ->view('emails.events.coachAssignedOnEvent', [
                'assigned_event' => $this->assignedEvent,
                'assigned_event_start_date' => Carbon::parse($this->assignedEvent['start_date'])->format('Y-m-d'),
                'assigned_event_end_date' => Carbon::parse($this->assignedEvent['end_date'])->format('Y-m-d')
            ]);
    }
}
