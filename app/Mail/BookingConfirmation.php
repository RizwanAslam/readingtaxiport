<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $name= 'fsdf';

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
        
        return $this->markdown('emails.send',compact('customer','booking','location'));
    }
}
