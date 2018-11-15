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

    public function getVerifiedUsers()
    {
        return User::whereNotNull('email_verified_at');
    }

    public function getFriendByEmail($email)
    {
        return User::where('email',$email);
    }

}