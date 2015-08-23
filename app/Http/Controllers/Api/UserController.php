<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Request;
use App\Repositories\User\UserRepository;
use App\Http\Requests\StoreUserPostRequest;

class UserController extends ApiController
{
    protected $model;

    public function __construct(UserRepository $user) {
        $this->model = $user;
    }

    public function store()
    {
        $input = Request::all();
        dd($input);
    }

}
