<?php

namespace App\Http\Controllers;

use App\Service\FriendService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    private $friendService;

    function __construct()
    {
        $this->middleware('auth');
    }

    private function getFriendService()
    {
        if(is_null($this->friendService)){
            $this->friendService = new FriendService();
        }
        return $this->friendService;
    }

    public function index($friend_id = 0,Request $request)
    {
        $filters = array();
        $term = $request->get('term');
        if($term){
            $filters = array('name'=>$term);
        }
        $friends = $this->getFriendService()->getAllFriends($filters);
        return response()->json($friends, 200);
    }

    public function addFriend(){
        return view('friend/invitation');
    }

    public function show($friend_id)
    {
        $filters = array();
        if($friend_id && $friend_id !=0){
            $filters = array('friend_id'=>$friend_id);
        }
        $friends = $this->getFriendService()->getAllFriends($filters);
        return view('home')->with(array('friends'=>$friends));

    }

    public function invite(Request $request){
        $email = $request->get('email');
        $loggedInUserId = Auth::id();
        $this->getFriendService()->inviteFriend($loggedInUserId,$email);
        return view('friend/invitation');
    }

    public function confirmFriendRequest(Request $request){
        $requestUserId = $request->get('user');
        $response = $this->getFriendService()->confirmRequest($requestUserId);
        if($response == 1){
            $request->session()->flash('status', 'Request Confirmation Successful !');
        }
        return redirect('home');
    }


}
