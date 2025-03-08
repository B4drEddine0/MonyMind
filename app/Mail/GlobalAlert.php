<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GlobalAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The data array containing user and alert information.
     */
    public $data;
    public $username;
    public $alert;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->username = $data['username'];
        $this->alert = $data['alert'];
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Alerte Budgétaire MoneyMind')
                     ->view('emails.global');
    }
}
