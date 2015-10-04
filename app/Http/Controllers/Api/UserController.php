<?php namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Request;
use App\Repositories\User\UserRepository;
use App\Http\Requests\StoreUserPostRequest;

class UserController extends ApiController
{
    protected $repo;

    public function __construct(UserRepository $user) {
        $this->repo = $user;
    }

    //override method to show all the data we need for guests
    public function userWithGuests($userId) {
        $user = $this->repo->getUserWithGuests($userId);
        return $this->apiResponse($user->toArray(), 'application/json');
    }

    public function store() {
        $input = Request::all();
        dd($input);
    }

}
