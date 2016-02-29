<?php namespace App\Repositories\User;

interface UserRepository
{
    public function all();

    public function findById($id);

    public function findByEmail($email);

    public function create($params);

    public function activate($userId, $params);

    public function update($userId, $params);

    public function addGuest($userId, $params);

    public function getUserWithGuests($userId);

    public function checkIfEmailIsAvailable($email);

    public function getAllUserInfo($userId);

    public function syncUserGuests($user, $guests);
}