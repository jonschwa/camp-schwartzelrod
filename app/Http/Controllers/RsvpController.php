<?php namespace App\Http\Controllers;

use Auth;
use App\Repositories\Rsvp\RsvpRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Guest\GuestRepository;

class RsvpController extends Controller
{
    protected $userRepo;
    protected $rsvpRepo;
    protected $guestRepo;

    public function __construct(UserRepository $userRepo,
                                GuestRepository $guestRepo,
                                RsvpRepository $rsvpRepo)
    {
        //$this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->rsvpRepo = $rsvpRepo;
        $this->guestRepo = $guestRepo;
    }

    public function store()
    {
        $user = Auth::user();
        $allUserInfo = $this->userRepo->getAllUserInfo($user->id);

        //return $allUserInfo;
        return view('rsvp.index', ['user' => $allUserInfo]);
    }

    public function bummer()
    {
        return view('rsvp.bummer');
    }


}