<?php

namespace App\Listener;

use App\Event\RequestSending;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class FriendRequestNotification
{

    public function handle(RequestSending $event)
    {
        if ($event->friend instanceof MustVerifyEmail) {
            $event->friend->sendEmailVerificationNotification();
        }
    }
}
