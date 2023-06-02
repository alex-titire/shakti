<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class EmailEventFinished extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Subscriber
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscriber $order)
    {
        $this->order = $order;

        App::setLocale($order->language);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@venus.org.ro')
                    ->subject(__('general.mail_subject_event_finished'))
                    ->replyTo(config('site.contact_email'))
                    ->view('emails.event_finished')
//                    ->view('emails.free_stuff')
                        ->with(
                            ['title' => __('general.mail_subject_event_finished')]
                        );
    }
}
