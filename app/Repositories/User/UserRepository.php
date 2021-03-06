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

    public function checkIfEmailIsAvailable($email, $user=false);

    public function getAllUserInfo($userId);

    public function syncUserGuests($user, $guests);

    public function getUsers();

    public function getUsersWithNoRsvp();

    public function getUsersWithRsvp();
}