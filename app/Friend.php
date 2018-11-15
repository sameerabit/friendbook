<?php

namespace App;

use App\Notification\CustomEmailVerifier;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Friend extends Model implements MustVerifyEmail
{

    use Notifiable;


    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        // TODO: Implement hasVerifiedEmail() method.
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        // TODO: Implement markEmailAsVerified() method.
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomEmailVerifier());

    }
}
