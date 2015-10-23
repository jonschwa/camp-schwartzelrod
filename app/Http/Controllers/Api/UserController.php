<?php namespace App\Http\Controllers\Api;

use Event;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use App\Repositories\User\UserRepository;

class UserController extends ApiController
{

    protected $storeRules = [
        'first_name'       => 'required|max:30',
        'last_name'        => 'required|max:30',
        'email'            => 'required|unique:users,email|max:100',
        'password'         => 'required',
        'password_confirm' => 'required|same:password'
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
        $validator = \Validator::make($request->all(), $this->storeRules);
        if ($validator->fails())
        {
            return $this->apiErrorResponse('Unable to register', $validator->errors()->toArray());
        }

        if ($user = $this->repo->create($request->all()))
        {
            //fire user creation event
            Event::fire(new UserWasCreated(['user' => $user]));
            //log them in
            return $this->apiResponse('User created', $user);
        }
    }
}
