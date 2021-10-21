<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class ChildrenVoucherCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $parent;
    protected $coupon;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parent, $coupon)
    {
        $this->parent = $parent;
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Voucher')->view('emails.voucher', ['parent'=>$this->parent, 'coupon'=>$this->coupon, 'expiry_date'=>Carbon::parse($this->coupon->expiration_date)->format('d/m/y')]);
    }
}
