<?php namespace App\Repositories\User;

interface UserRepository
{
    public function all();

    public function findById($id);

    public function findByEmail($email);

    public function create($params);

    public function activate($userId, $params);

    public function addGuest($userId, $params);

    public function getUserWithGuests($userId);

    public function getAllUserInfo($userId);
}