<?php

namespace App\Dao;

use App\Friend;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function confirmRequest($requestedUser,$loggedInUserId)
    {
        return Friend::where(['user_id'=>$requestedUser,'friend_id'=>$loggedInUserId])
            ->update(['email_verified_at' => Carbon::now()->toDateTimeString()]);
    }

    public function getAllFriendsByUserId($loggedInUserId,$filter=array()){
       $query = User::with('friends')->where('id', $loggedInUserId);
       if(count($filter)>0){
           if(isset($filter['name'])){
               $name = $filter['name'];
               $query->where(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'like', "%$name%");
           }
           if(isset($filter['friend_id'])){
               $friend_id = $filter['friend_id'];
               $query->where('id',$friend_id);
           }
       }
       return $query->get();
    }

}