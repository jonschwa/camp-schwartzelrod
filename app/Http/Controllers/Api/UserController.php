<?php namespace App\Http\Controllers\Api;

use Auth;
use Event;
use Validator;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends ApiController
{
    protected $storeRules = [
        'first_name'       => 'required|max:30',
        'last_name'        => 'required|max:30',
        'email'            => 'required|unique:users,email|max:100',
        'password'         => 'required',
        'password_confirm' => 'required|same:password'
    ];

    protected $activateRules = [
        'first_name'       => 'required|max:30',
        'last_name'        => 'required|max:30',
        'email'            => 'required|max:100',
        'password'         => 'required',
        'password_confirm' => 'required|same:password'
    ];

    protected $loginRules = [
        'email'            => 'required|exists:users,email',
        'password'         => 'required',
    ];

    protected $repo;

    public function __construct(UserRepository $user) {
        $this->repo = $user;
    }

    public function userWithGuests($userId)
    {
        $user = $this->repo->getUserWithGuests($userId);
        return $this->apiResponse('ok', $user->toArray());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->activateRules);
        if ($validator->fails())
        {
            return $this->apiErrorResponse('Unable to register', $validator->errors()->toArray());
        }
        if ($user = $this->repo->create($request->all()))
        {
            Auth::login($user);
            Event::fire(new UserWasCreated(['user' => $user]));
            return $this->apiResponse('User created and logged in!', $user);
        }
    }

    public function activate($userId, Request $request)
    {
        $user = $this->repo->findById($userId);
        if($user->count() < 1) {
            return $this->apiErrorResponse('User not found', 403);
        }

        $validator = Validator::make($request->all(), $this->storeRules);
        if ($validator->fails())
        {
            return $this->apiErrorResponse('Unable to register', 503, $validator->errors()->toArray());
        }

        if ($user = $this->repo->activate($userId, $request->all()))
        {
            Auth::loginUsingId($user->id);
            Event::fire(new UserWasCreated(['user' => $user]));
            return $this->apiResponse('User registered and logged in!', $user);
        }
        else
        {
            return $this->apiErrorResponse('Error activating user');
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), $this->loginRules);
        if ($validator->fails())
        {
            return $this->apiErrorResponse('Unable to log in', 503, $validator->errors()->toArray());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return $this->apiResponse('User logged in successfully!');
        }
        else
        {
            return $this->apiErrorResponse('Incorrect Login/Password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return $this->apiResponse('User logged out');
    }
}
