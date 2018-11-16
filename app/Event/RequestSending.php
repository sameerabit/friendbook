<?php

namespace App\Event;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class RequestSending extends Mailable
{
    use SerializesModels;

    public $friend;

    public $loggedInUserId;

    public function __construct($friend,$loggedInUserId)
    {
        $this->friend = $friend;
    }

    public function build()
    {
        return $this->view('emails.confirmRequest')
            ->with([
                "loggedUser"=> Auth::user(),
                "friend"=> $this->friend,
            ]);
    }
}
