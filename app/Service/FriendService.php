<?php

namespace App\Service;

use App\Dao\FriendDao;
use App\Event\RequestSending;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
        Mail::to($user->email)->send(new RequestSending($user,$loggedInUserId));
        $friend = $this->getFriendDao()->save($loggedInUserId,$user->id);
    }

    public function confirmRequest($requestedUser){
        $loggedInUserId = Auth::id();
        return $this->getFriendDao()->confirmRequest($requestedUser,$loggedInUserId);
    }

    public function getAllFriends($filter = array()){
        $loggedInUserId = Auth::id();
        if(isset($filter["name"]) && strlen($filter["name"])>0){
            $autocomplete = array();
            $friends = $this->getFriendDao()->getAllFriendsByUserId($loggedInUserId,$filter);
            foreach ($friends as $friend){
                $autocomplete[]=[
                    "label"=>$friend->first_name." ".$friend->last_name,
                    "value"=>$friend->id,
                ];
            }
            return $autocomplete;
        }
        return $this->getFriendDao()->getAllFriendsByUserId($loggedInUserId);
    }

    public function showFriend($filter = array()){
        $loggedInUserId = Auth::id();
        return $this->getFriendDao()->getAllFriendsByUserId($loggedInUserId,$filter);
    }



}