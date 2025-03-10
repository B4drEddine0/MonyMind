<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class autoSalaire extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $username;
    public $salaire;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->username = $data['username'];
        $this->salaire = $data['salaire'];
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Notification de Salaire - MoneyMind')
                     ->view('emails.salaire');
    }
}
