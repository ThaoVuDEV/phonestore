<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cartItems;
    public $totalAmount;
    public $cartTotal;
    public $discount;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $cartItems
     * @param $totalAmount
     * @param $cartTotal
     * @param $discount
     */
    public function __construct($user, $cartItems, $totalAmount, $cartTotal, $discount)
    {
        $this->user = $user;
        $this->cartItems = $cartItems;
        $this->totalAmount = $totalAmount;
        $this->cartTotal = $cartTotal;
        $this->discount = $discount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.thanks')
                    ->subject('Cảm ơn  bạn đã mua hàng');
    }
}
