<?php

namespace App\Http\Controllers;

use App\Service\FriendService;
use App\Service\UserService;

class HomeController extends Controller
{
    private $friendService;


    private function getFriendService()
    {
        if(is_null($this->friendService)){
            $this->friendService = new FriendService();
        }
        return $this->friendService;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = $this->getFriendService()->getAllFriends();
        return view('home')->with(array('friends'=>$friends));
    }
}
