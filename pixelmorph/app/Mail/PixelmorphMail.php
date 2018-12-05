<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PixelmorphMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $email;
    public $woher;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email, $woher, $text)
    {
        $this->user = $user;
        $this->email = $email;
        $this->woher = $woher;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@pixelmorph.de')
            ->view('components.email');
    }
}
