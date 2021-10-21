<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventMembersSummaryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $member;
    public $event;
    public $mailBody;
    public $includeEventDetails;

    public function __construct($member, $event, $mailBody = null, $includeEventDetails = null)
    {
        $this->member = $member;
        $this->event = $event;
        $this->mailBody = $mailBody;
        $this->includeEventDetails = $includeEventDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->member->email)
        ->subject('You have been invited to a N1DP Event')
        ->view('emails.events.EventMemberInvitation',
           [
            'mail_body'=>$this->mailBody,
            'include_link_to_event'=>$this->includeEventDetails,
            'event_start_date'=>Carbon::parse($this->event->start_date)->format('l jS  F Y'),
            'event_end_date'=>Carbon::parse($this->event->end_date)->format('l jS  F Y'),
            'event_start_time'=>Carbon::parse($this->event->start_time)->format('g:i A'),
            'event_end_time'=>Carbon::parse($this->event->end_time)->format('g:i A'),

            ]
        );
    }
}
