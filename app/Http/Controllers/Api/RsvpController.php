<?php namespace App\Http\Controllers\Api;

use Event;
use Validator;
use App\Events\UserRsvped;
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
        'email'              => ['required','email'],
    ];

    protected $optOutRules = [
        'will_attend'        => 'required|in:-2,-1,1,0',
        'first_name'         => 'required',
        'last_name'          => 'required',
        'contact_preference' => 'required_if:will_attend,-2',
        'email'              => 'email|required_if:contact_preference,email',
        'phone'              => ['required_if:contact_preference,phone','regex:/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/']
    ];

    protected $optOutMessages = [
        'email.required_if' => 'We will need your email to contact you!',
        'phone.required_if' => 'We will need your phone number to call you!',
        'contact_preference.required_if' => 'Required',
        'first_name.required' => 'Required',
        'last_name.required' => 'Required',
        'phone.regex' => 'Invalid phone number',
        'email.email' => 'Invalid email',
        'email.required' => 'Required'
    ];

    protected $storeRules = [
        'will_attend'        => 'required|in:-2,-1,1,0',
        'num_guests'         => 'numeric',
    ];

    protected $storeRulesMessages = [
        'email.required' => 'Required',
        'email.required_if' => 'Required',
        'phone.required_if' => 'We will need your phone number to call you!',
        'contact_preference.required_if' => 'Please let us know how to contact you.',
        'first_name.required' => 'Required',
        'last_name.required' => 'Required',
        'email.email' => 'Invalid email',
    ];

    public function __construct(RsvpRepository $rsvp, UserRepository $user) {
        $this->repo = $rsvp;
        $this->user = $user;
    }

    public function store($userId, Request $request)
    {
        $user = $this->user->findById($userId);
        $isChangedRsvp = $initialRsvp = false;

        $isFirstRsvp = $user->has_rsvped ? false : true;

        if(!$isFirstRsvp) {
            $initialRsvp = $user->rsvp;
        }
        if(isset($request->all()['with_user_update'])) {
            $validatorRules = $this->userStoreRules;
            $validatorMessages = $this->storeRulesMessages;
        }
        else {
            $validatorRules = $this->storeRules;
            $validatorMessages = $this->storeRulesMessages;
        }

        if(isset($request->all()['will_attend']) && $request->all()['will_attend'] == -2) {
            $validatorRules = $this->optOutRules;
            $validatorMessages = $this->optOutMessages;
        }

        $validator = Validator::make($request->all(), $validatorRules, $validatorMessages);
        if ($validator->fails()) {
            return $this->apiErrorResponse('Unable to RSVP', 503, $validator->errors()->toArray());
        }
        $params = $request->all();

        if(isset($params['email'])) {
            if($this->user->checkIfEmailIsAvailable($params['email'], $user) == false){
                return $this->apiErrorResponse('Unable to RSVP', 503, ['email' => 'This email is already taken']);
            }
        }
        $userUpdate = $this->user->update($userId, $params);

        if($rsvp = $this->repo->saveRsvp($user, $params)) {
            if($initialRsvp && !is_null($initialRsvp)) {
                $isChangedRsvp = $this->checkForRsvpChange($initialRsvp, $rsvp);
            }
            Event::fire(new UserRsvped(['user' => $userUpdate,'isFirstRsvp' => $isFirstRsvp, 'rsvp' => $rsvp, 'isChangedRsvp' => $isChangedRsvp]));
            return $this->apiResponse('Thanks for RSVPing!', ['user' => $user, 'rsvp' => $rsvp]);
        }
        else {
            return $this->apiErrorResponse('Something went wrong');
        }
    }

    private function checkForRsvpChange($initialRsvp, $rsvp) {
        if($initialRsvp->will_attend != $rsvp->will_attend) {
            return true;
        }
        return false;
    }
}