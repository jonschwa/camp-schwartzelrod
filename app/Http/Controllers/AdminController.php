<?php namespace App\Http\Controllers;

use App\AccessLog;
use App\Repositories\User\UserRepository;
use App\Repositories\Rsvp\RsvpRepository;
use App\Repositories\Guest\GuestRepository;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    protected $user;
    protected $guest;
    protected $rsvp;

    public function __construct(GuestRepository $guest,
                                UserRepository $user,
                                RsvpRepository $rsvp)
    {
        $this->middleware('admin');
        $this->user = $user;
        $this->guest = $guest;
        $this->rsvp = $rsvp;
    }

    public function dashboard()
    {
        /*
         * @array of Collection Objects
         * Contains ['yes', 'no', 'maybe' ,'optOut', 'all', 'numbers']
         */
        $allRsvps = $this->rsvp->getAllRsvps();

        //$attendees = $this->guest->getAttendees();

        //last invitations actually accessed
        $accessLog = AccessLog::where('loggable_type', 'invitation')
                              ->orderBy('created_at', 'asc')
                              ->take('100');

        /*
         * @array of Collection Objects
         * Contains ['active', 'inactive']
         */
        $allUsers = $this->user->getUsers();

        return view('admin.dashboard', ['rsvps' => $allRsvps,
                                        'users' => $allUsers,
                                        'accessLog' => $accessLog
            ]
        );
    }
}