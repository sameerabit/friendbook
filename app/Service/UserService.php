<?php

namespace App\Service;

use App\Dao\UserDao;


/**
 * Created by PhpStorm.
 * User: sameera
 * Date: 11/15/18
 * Time: 11:48 PM
 */
class UserService
{

    private $userDao;

    private function getUserDao()
    {
       if(is_null($this->userDao)){
           $this->userDao = new UserDao();
       }
       return $this->userDao;
    }

    public function getVerifiedUsers(){
        return $this->getUserDao()->getVerifiedUsers();
    }

    public function getUserByEmail($email){
        return $this->getUserDao()->getUserByEmail($email);

    }

}