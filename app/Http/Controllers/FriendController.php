<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Service\FriendService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    private $friendService;

    private function getFriendService()
    {
        if(is_null($this->friendService)){
            $this->friendService = new FriendService();
        }
        return $this->friendService;
    }

    public function index()
    {
        return view('friend/invitation');
    }

    public function invite(Request $request){
        $email = $request->get('email');
        $loggedInUserId = Auth::id();
        $this->getFriendService()->inviteFriend($loggedInUserId,$email);

        dd("save");
    }
}
