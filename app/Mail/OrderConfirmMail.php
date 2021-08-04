<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $checkout_data;
    public $invoice_id;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($checkout_data,$invoice_id)
    {
        $this->checkout_data=$checkout_data;
        $this->invoice_id=$invoice_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(setting('contact.email'))
                    ->cc(setting('contact.email'))
                    ->subject('New Order')
                    ->markdown('mail.order-confirm');
    }
}
