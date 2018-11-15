<?php

namespace App\Service;

use App\Dao\FriendDao;
use App\Event\RequestSending;


/**
 * Created by PhpStorm.
 * User: sameera
 * Date: 11/15/18
 * Time: 11:48 PM
 */
class FriendService
{

    private $friendDao;
    private $userService;

    private function getFriendDao()
    {
       if(is_null($this->friendDao)){
           $this->friendDao = new FriendDao();
       }
       return $this->friendDao;
    }

    private function getUserService()
    {
        if(is_null($this->userService)){
            $this->userService = new UserService();
        }
        return $this->userService;
    }

    public function inviteFriend($loggedInUserId,$email){
        $user = $this->getUserService()->getUserByEmail($email);
        $friend = $this->getFriendDao()->save($loggedInUserId,$user->id);
        event(new RequestSending($user));
    }



}