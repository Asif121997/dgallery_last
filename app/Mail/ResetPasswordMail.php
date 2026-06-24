<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($resetlink)
    {
        
        $this->resetLink = $resetlink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset-password')
                    ->subject('Şifrə Yeniləmə Linki')
                    ->with(['token' => $this->token,'resetLink' => $this->resetLink]);
    }
}

