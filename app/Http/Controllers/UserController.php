<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user) {
        $this->user = $user;
    }

    public function index() {
        return $this->user->all();
    }

    public function show($id) {
        return $this->user->findById($id);
    }

}
