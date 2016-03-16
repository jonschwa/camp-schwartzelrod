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
        if($loggedInUser->is_admin == 1) {
            return redirect('/admin');
        }
        $user = $this->user->getAllUserInfo($loggedInUser->id);
        $rsvp = !is_null($user->rsvp()) ? $user->rsvp()->first(): null;
        $onSiteInfo = [];
        $offSiteInfo = [];
        $hotelChoices = [
            'hampton-inn' => 'Staying at the Hampton Inn',
            'shore-acres-inn' => 'Staying at the Shore Acres Inn',
            'north-hero-house' => 'Staying at the North Hero House',
            'airbnb' => 'Staying in an AirBNB',
            'other'  => 'Other/Not Sure Yet'
        ];
        $cabinAdventureLevels = [
            1 => 'Private Cabin',
            2 => 'Shared Cabin',
            3 => 'Group Cabin',
            4 => 'Party Cabin'
        ];

        if($user->guests->first()->is_staying == 0) {
            $offSiteInfo['hotel_choice'] = $user->guests->first()->hotel_choice;
        }
        if($user->guests->first()->is_staying == 1) {
            if($user->guests->first()->in_cabin == 1) {
                $onSiteInfo['staying_in'] = 'cabin';
                $onSiteInfo['adventureLevel'] = $user->guests->first()->cabin_adventure_level;
                $onSiteInfo['bunkmates'] = $user->guests->first()->desired_bunkmates;
            }
            else {
                $onSiteInfo['staying_in'] = 'byo';
                $onSiteInfo['byo_plan'] = $user->guests->first()->byo_plan;
            }
        }
        return view('users.home_loggedin', [
                                            'user' => $user,
                                            'rsvp' => $rsvp,
                                            'onSiteInfo' => $onSiteInfo,
                                            'offSiteInfo' => $offSiteInfo,
                                            'hotelChoices' => $hotelChoices,
                                            'cabinAdventureLevels' =>$cabinAdventureLevels
                                        ]);
    }
}