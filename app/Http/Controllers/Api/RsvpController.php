<?php namespace App\Http\Controllers\Api;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\Rsvp\RsvpRepository;
use App\Repositories\User\UserRepository;

class RsvpController extends ApiController
{
    protected $repo;
    protected $user;

    protected $storeRules = [
        'will_attend' => 'required|in:1,0',
        'num_guests' => 'numeric'
    ];

    public function __construct(RsvpRepository $rsvp, UserRepository $user) {
        $this->repo = $rsvp;
        $this->user = $user;
    }

    public function store($userId, Request $request)
    {
        $user = $this->user->findById($userId)->first();

        $validator = Validator::make($request->all(), $this->storeRules);
        if ($validator->fails()) {
            return $this->apiErrorResponse('Unable to RSVP', 503, $validator->errors()->toArray());
        }

        $params = $request->all();
        if($rsvp = $this->repo->saveRsvp($user, $params)) {
            return $this->apiResponse('Thanks for RSVPing!');
        }
        else {
            return $this->apiErrorResponse('Something went wrong');
        }
    }
}