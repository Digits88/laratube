<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmAccountEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $url;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $url
     */
    public function __construct($name, $url)
    {
        //
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@laratube.com')->view('emails.confirmMail');
    }
}
