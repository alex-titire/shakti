<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class EmailDynamicNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     */
    public $user;

    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $user)
    {
        $this->mail = $mail;
        $this->user = $user;

        $this->mail->content_html_ro = str_replace('{first_name}', $user->first_name, $mail->content_html_ro);
        $this->mail->content_html_en = str_replace('{first_name}', $user->first_name, $mail->content_html_en);

//        App::setLocale($user->language);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@venus.org.ro', $this->mail->from_name)
                    ->subject($this->mail->subject)
                    ->replyTo(config('site.contact_email'))
                    ->markdown('emails.custom_notification')
                        ->with(
                            ['title' => $this->mail->subject]
                        );
    }
}
