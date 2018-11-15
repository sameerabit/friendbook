<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $userService;

    private function getUserService()
    {
        if(is_null($this->userService)){
            $this->userService = new UserService();
        }
        return $this->userService;
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
        $verifiedUsers = $this->getUserService()->getVerifiedUsers();
       // dd($verifiedUsers);
        return view('home');
    }
}
