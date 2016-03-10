<?php namespace App\Http\Controllers\Api;

use Auth;
use Event;
use Input;
use Validator;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use App\Repositories\User\UserRepository;
use App\Repositories\Guest\GuestRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends ApiController
{
    protected $storeRules = [
        'first_name'       => 'required|max:30',
        'last_name'        => 'required|max:30',
        'email'            => 'required|unique:users,email|max:100|email',
        'password'         => 'required',
        'password_confirm' => 'required|same:password'
    ];

    protected $storeMessages = [
        'password_confirm.same' => 'The password and password confirm must match',
        'email.required' => 'Required',
        'first_name.required' => 'Required',
        'last_name.required' => 'Required',
        'password.required' => 'Required',
        'password_confirm.required' => 'Required',
    ];

    protected $activateRules = [
        'first_name'       => 'required|max:30',
        'last_name'        => 'required|max:30',
        'email'            => 'required|max:100|email',
        'password'         => 'required',
        'password_confirm' => 'required|same:password'
    ];

    protected $loginRules = [
        'email'            => 'required|exists:users,email',
        'password'         => 'required',
    ];

    protected $repo;
    protected $guest;

    public function __construct(UserRepository $user, GuestRepository $guest)
    {
        $this->repo = $user;
        $this->guest = $guest;
    }

    public function userWithGuests($userId)
    {
        $user = $this->repo->getUserWithGuests($userId);
        return $this->apiResponse('ok', $user->toArray());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->storeRules, $this->storeMessages);
        if ($validator->fails()) {
            return $this->apiErrorResponse('Unable to register', $validator->errors()->toArray());
        }
        if ($user = $this->repo->create($request->all())) {
            Auth::login($user);
            Event::fire(new UserWasCreated(['user' => $user]));
            return $this->apiResponse('User created and logged in!', $user);
        }
    }

    public function activate($userId, Request $request)
    {
        $user = $this->repo->findById($userId);
        if($user->count() < 1) {
            return $this->apiErrorResponse('User not found', 404);
        }

        $validator = Validator::make($request->all(), $this->activateRules, $this->storeMessages);
        if ($validator->fails()) {
            return $this->apiErrorResponse('Unable to register', 400, $validator->errors()->toArray());
        }

        if($this->repo->checkIfEmailIsAvailable($request->all()['email'])) {
            if ($user = $this->repo->activate($userId, $request->all())) {
                Auth::loginUsingId($user->id);
                Event::fire(new UserWasCreated(['user' => $user]));
                return $this->apiResponse('User registered and logged in!', $user);
            } else {
                return $this->apiErrorResponse('Error activating user');
            }
        }
        else {
            return $this->apiErrorResponse('Error activating user', 503, ['email' => 'This email is already taken']);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), $this->loginRules);
        if ($validator->fails()) {
            return $this->apiErrorResponse('Unable to log in', 400, $validator->errors()->toArray());
        }
        //check if this user exists
        $user = $this->repo->findByEmail($request->email);
        if($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                Auth::loginUsingId($user->id);
                return $this->apiResponse('User logged in successfully!');
            } else {
                return $this->apiErrorResponse('Incorrect Login/Password', 403);
            }
        }
        else {
            return $this->apiErrorResponse('User not found', 404);
        }
    }

    public function logout()
    {
        Auth::logout();
        return $this->apiResponse('User logged out');
    }

    public function updateUserGuests($userId)
    {
        $user = $this->repo->findById($userId);
        $guestData = Input::all();
        $guests = $this->guest->createOrUpdate($user, $guestData['guests']);
        $this->guest->deleteOldGuests($user, $guests);
        return $this->apiResponse('Updated guests!');
    }
}
