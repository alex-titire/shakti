<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class EmailCustomNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     */
    public $user;

    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $link)
    {
        $this->user = $user;
        $this->link = $link;

        App::setLocale($user->language);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@venus.org.ro', __('general.venus_team'))
                    ->subject(__('general.mail_subject_free_camp'))
                    ->replyTo(config('site.contact_email'))
                    ->view('emails.custom_notification')
                        ->with(
                            ['title' => __('general.mail_subject_free_camp')]
                        );
    }
}
