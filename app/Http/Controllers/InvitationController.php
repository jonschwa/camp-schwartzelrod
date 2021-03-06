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

    public function saveTheDate()
    {
        return view('rsvp.enter_code');
    }
}
