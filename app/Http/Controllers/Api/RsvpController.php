<?php namespace App\Http\Controllers\Api;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\Rsvp\RsvpRepository;
use App\Repositories\User\UserRepository;

class RsvpController extends ApiController
{
    protected $repo;
    protected $user;

    protected $userStoreRules = [
        'will_attend'        => 'required|in:-2,-1,1,0',
        'num_guests'         => 'numeric',
        'first_name'         => 'required',
        'last_name'          => 'required',
        'contact_preference' => 'required_if:will_attend,-2',
        'email'              => 'required',
        'phone'              => 'required_if:contact_preference,phone'
    ];

    protected $storeRules = [
        'will_attend'        => 'required|in:-2,-1,1,0',
        'num_guests'         => 'numeric',
    ];

    protected $storeRulesMessages = [
        'email.required' => 'We need your email!',
        'phone.required_if' => 'We will need your phone number to call you!',
        'contact_preference.required_if' => 'Please let us know how to contact you.',
        'first_name.required' => 'We need your first name',
        'last_name.required' => 'We need your last name'
    ];

    public function __construct(RsvpRepository $rsvp, UserRepository $user) {
        $this->repo = $rsvp;
        $this->user = $user;
    }

    public function store($userId, Request $request)
    {
        $user = $this->user->findById($userId);

        if(isset($request->all()['with_user_update'])) {
            $validatorRules = $this->userStoreRules;
        }
        else {
            $validatorRules = $this->storeRules;
        }

        $validator = Validator::make($request->all(), $validatorRules, $this->storeRulesMessages);
        if ($validator->fails()) {
            return $this->apiErrorResponse('Unable to RSVP', 503, $validator->errors()->toArray());
        }
        $params = $request->all();

        $userUpdate = $this->user->update($userId, $params);

        if($rsvp = $this->repo->saveRsvp($user, $params)) {
            return $this->apiResponse('Thanks for RSVPing!', ['user' => $user, 'rsvp' => $rsvp]);
        }
        else {
            return $this->apiErrorResponse('Something went wrong');
        }
    }
}