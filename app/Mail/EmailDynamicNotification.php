<?php

namespace App\Mail;

use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class EmailDynamicNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Notification
     */
    public $mail;

    /**
     * other public variables
     */
    public $user, $find, $replace;

    /**
     * Create a new message instance.
     */
    public function __construct(Notification $mail, $user)
    {
        $this->mail = $mail;

        $this->find = ['{first_name}'];
        $this->replace = [strlen(trim($user->baptism_name)) > 0 ? $user->baptism_name : $user->first_name];

        App::setLocale($user->language);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@venus.org.ro', $this->mail->from_name ?? 'Venus'),
            replyTo: [
                new Address($this->mail->reply_to ?? config('site.contact_email')),
            ],
            subject: $this->mail->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.custom_notification',
            text: '',
            with: [
                'title' => $this->mail->subject
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
