<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected string $name, $emailFrom, $message;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->name      = $data['name'];
        $this->emailFrom = $data['email'];
        $this->message   = $data['message'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email de contacto',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact',
            with: [
                'name'      => $this->name,
                'emailFrom' => $this->emailFrom,
                'message'   => $this->message
            ]
        );
    }

    public function build(): ContactEmail
    {
        return $this->markdown('emails.contact', [
            'message'      => $this->message,
            'emailFrom' => $this->emailFrom,
            'name'      => $this->name
        ]);
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
