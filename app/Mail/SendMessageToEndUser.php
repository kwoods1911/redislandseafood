<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMessageToEndUser extends Mailable
{
    use Queueable, SerializesModels;
    public $senderMessage = '';
    public $name = '';
    public $url = '';
    public $mailData = '';
    /**
     * Create a new message instance.
     */
    public function __construct($name, $senderMessage, $mailData )
    {
        $this->name = $name;
        $this->senderMessage = $senderMessage;
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Message To End User',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'automated_reply_template',
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

    public function build()
    {
        return $this->view('emails.automated_reply_template')
                ->subject('Red Island Seafood Automated Reply')
                ->with([
                    'name' => $this->name,
                    'senderMessage' => $this->senderMessage,
                    'mailData' => $this->mailData,
                ])
                ->withCssInliner(public_path('email.css'));
                       
    }
}
