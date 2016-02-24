<?php namespace App\Http\Controllers;

use Auth;
use App\Repositories\User\UserRepository;
use App\Repositories\Guest\GuestRepository;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user, GuestRepository $guest) {
        $this->user = $user;
    }
    public function login()
    {
        return view('users.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('message', 'You\'re logged out!');
    }

    public function loggedInHome()
    {
        //get the logged in user's relevant information
        $loggedInUser = Auth::user();
        $user = $this->user->getAllUserInfo($loggedInUser->id);
        $rsvp = !is_null($user->rsvp()) ? $user->rsvp()->first(): null;
        $cabinInfo = [];
        if($user->guests->first()->is_staying == 1) {
            $cabinInfo['adventureLevel'] = $user->guests->first()->cabin_adventure_level;
            $cabinInfo['bunkmates'] = $user->guests->first()->desired_bunkmates;
        }
        return view('users.home_loggedin', ['user' => $user, 'rsvp' => $rsvp, 'cabinInfo' => $cabinInfo]);
    }
}