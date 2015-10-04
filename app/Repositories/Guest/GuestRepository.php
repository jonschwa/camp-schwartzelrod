<?php namespace App\Repositories\Guest;

interface GuestRepository
{
    public function all();

    public function findById($id);

    public function create($params);
}