<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $theme = 'default';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.access')
            ->with('data', $this->data)
            ->with('url', url('/'))
            ->subject('Acceso a Sazone')
            //->from(auth()->user()->email, auth()->user()->name)
        ;
    }
}
