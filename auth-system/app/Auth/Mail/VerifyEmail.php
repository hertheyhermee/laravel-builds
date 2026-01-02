<?php

namespace App\Auth\Mail;

use Illuminate\Mail\Mailable;

class VerifyEmail extends Mailable
{
    public function __construct(public string $url){}

    public function build()
    {
        return $this->subject('Verify Your Email Address')
            ->view('emails.verify-email')
            ->with([
            'url' => $this->url,
        ]);
    }
    
}
