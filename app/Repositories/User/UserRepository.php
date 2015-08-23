<?php

namespace App\Repositories\User;


interface UserRepository
{
    public function all();

    public function findById($id);

    public function create(array $params);

    public function addGuest($userId, array $params);
}