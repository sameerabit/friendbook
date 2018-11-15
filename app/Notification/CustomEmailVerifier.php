<?php

namespace App\Notification;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Messages\MailMessage;

class CustomEmailVerifier extends VerifyEmail
{

    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Confirm Friend Request'))
            ->line(Lang::getFromJson('Please click the button below to confirm friend request.'))
            ->action(
                Lang::getFromJson('Verify Email Address'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::getFromJson('If you did not create an account, no further action is required.'));
    }

}
