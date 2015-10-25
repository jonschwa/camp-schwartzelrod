<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Repositories\Guest\GuestRepository;
use App\Repositories\Invitation\InvitationRepository;

class GuestController extends Controller
{

    protected $userRepo;
    protected $invitationRepo;
    protected $guestRepo;

    public function __construct(UserRepository $userRepo,
                                InvitationRepository $invitationRepo,
                                GuestRepository $guestRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->invitationRepo = $invitationRepo;
        $this->guestRepo = $guestRepo;
    }

    public function index()
    {
        $user = $this->userRepo->getUserWithGuests(Auth::user()->id);
        return view('guests.index', ['user' => $user]);
    }
}
