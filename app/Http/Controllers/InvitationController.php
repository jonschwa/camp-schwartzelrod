<?php namespace App\Http\Controllers;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Repositories\Guest\GuestRepository;
use App\Repositories\Invitation\InvitationRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;

class InvitationController extends Controller
{
    protected $userRepo;
    protected $invitationRepo;
    protected $guestRepo;

    public function __construct(UserRepository $userRepo,
                                InvitationRepository $invitationRepo,
                                GuestRepository $guestRepo)
    {
        $this->userRepo       = $userRepo;
        $this->invitationRepo = $invitationRepo;
        $this->guestRepo      = $guestRepo;
    }

    public function saveTheDate($code=null) {
        if($code) {
            $invitation = $this->invitationRepo->getInvitationByCode($code);
            $user = $this->userRepo->getUserWithGuests($invitation->user->id);
            //is this user activated?
            if($user->activated) {
                return view('user.login');
            }
            else {
                return view('rsvp.activation', ['user' => $user, 'invitation' => $invitation, 'guests' => $user->guests]);
            }

        }
        else {
            $inputs = \Input::all();
            if(isset($inputs['rsvp-code'])) {
                return redirect('/savethedate/' . $inputs['rsvp-code']);
            }
            return view('rsvp.enter_code');
        }
    }
}
