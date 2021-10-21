<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class ChildrenBirthdayAutomatedVoucherMail extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $coupon;
    public $children;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parent, $children, $coupon)
    {
        $this->parent = $parent;
        $this->coupon = $coupon;
        $this->children = $children;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Happy Birthday '.$this->children['first_name'])
            ->view('emails.events.childrenBirthdayVoucher')->with(['parent' => $this->parent, 'children'=>$this->children, 'coupon' => $this->coupon]);
    }
}
