<?php

namespace App\Mail;

use App\Models\Notification;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderComplete extends Mailable
{
    use Queueable, SerializesModels;

    public $currencySymbol, $payment_link, $mail, $find, $replace;

    /**
     * Create a new message instance.
     */
    public function __construct(public Order $order)
    {
        $this->currencySymbol = ($order->currency == "eur" ? "€" : "Lei");
        $this->payment_link = $order->getPaymentLink();

        switch ($order->payment) {
            case 'card':
                $this->mail = $order->event->email_card;
                break;

            case 'transfer':
                $this->mail = $order->event->email_bank;
                break;

            case 'cash':
            default:
                $this->mail = $order->event->email_cash;
                break;
        }

        $this->find = ['{first_name}', '{last_name}', '{order_id}', '{order_total}', '{order_currency}', '{order_payment}'];
        $this->replace = [$order->baptism_name ?? $order->first_name, $order->last_name, $order->id, $order->price / 100, $order->currency, $order->payment];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('general.mail_subject_order_finished'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.custom_notification',
            text: 'emails.text_notification',
            with: [
                'title' => __('general.mail_subject_order_finished')
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
