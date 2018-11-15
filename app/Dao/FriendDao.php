<?php

namespace App\Dao;

use App\Friend;
use App\User;

/**
 * Created by PhpStorm.
 * User: sameera
 * Date: 11/15/18
 * Time: 11:45 PM
 */
class FriendDao
{
    public function save($loggedInUserId,$friend_id)
    {
        $friend = new Friend();
        $friend->user_id = $loggedInUserId;
        $friend->friend_id = $friend_id;
        $friend->save();
        return $friend;
    }

}