<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $customer=\App\customer::latest('created_at')->limit(1)->first();
        $booking=\App\booking::latest('created_at')->limit(1)->first();
        $location=\App\location::latest('created_at')->limit(1)->first();
        
        return $this->markdown('emails.receive',compact('customer','booking','location'));
    }
}
