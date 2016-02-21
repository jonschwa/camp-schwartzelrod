<?php namespace App\Http\Controllers;

use Auth;
use App\Repositories\Rsvp\RsvpRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Guest\GuestRepository;
use Illuminate\Support\Collection;

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
        $rsvp = !is_null($user->rsvp()) ? $user->rsvp()->first(): null;
        $lodgingInfo = new Collection;

        $lodgingInfo->is_staying = $user->guests->first()->is_staying;
        $lodgingInfo->cabin_adventure_level = $user->guests->first()->cabin_adventure_level;
        $lodgingInfo->desired_bunkmates = $user->guests->first()->desired_bunkmates;

        return view('rsvp.index', ['user' => $allUserInfo,
                                   'rsvp' => $rsvp,
                                   'numGuests' => $user->guests->count(),
                                   'lodging' => $lodgingInfo
            ]);
    }

    public function bummer()
    {
        return view('rsvp.bummer');
    }


}