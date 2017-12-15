<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCard extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        return $this->from($this->data['from'])
                    ->subject("You've received a holiday Ecard from The Shack Movie")
                    ->view('emails.sendcard')->with([
                        'to' => $this->data['to'],
                        'from' => $this->data['from'],
                        'image' => $this->data['image']
                    ]);
    }
}
