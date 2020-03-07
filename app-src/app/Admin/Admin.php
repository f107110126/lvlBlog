<?php

namespace App\Admin;

use App\User;
use App\Admin\Auth\ResetPassword as ResetPasswordNotification;

class Admin extends User
{
    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
