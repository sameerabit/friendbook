<?php

namespace App\Dao;

use App\User;

/**
 * Created by PhpStorm.
 * User: sameera
 * Date: 11/15/18
 * Time: 11:45 PM
 */
class UserDao
{

    public function getVerifiedUsers($loggedInUserId)
    {
        return User::whereNotNull('email_verified_at');
    }

    public function getUserByEmail($email)
    {
        return User::where('email',$email)->first();
    }

}