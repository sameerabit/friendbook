<?php

namespace App\Event;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestSending extends Mailable
{
    use SerializesModels;

    public $friend;

    public function __construct($friend)
    {
        $this->friend = $friend;
    }

    public function build()
    {
        return $this->view('emails.confirmRequest');
    }
}
