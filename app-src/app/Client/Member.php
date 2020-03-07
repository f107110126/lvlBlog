<?php

namespace App\Client;

use App\User;
use App\Client\Auth\ResetPassword as ResetPasswordNotification;

class Member extends User
{
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
