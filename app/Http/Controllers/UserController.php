<?php namespace App\Http\Controllers;

use Auth;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user) {
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
        return view('users.home_loggedin', ['user' => $user, 'rsvp' => $rsvp]);
    }
}