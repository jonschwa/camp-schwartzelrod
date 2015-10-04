<?php namespace App\Repositories\Guest;

use App\Guest;
use App\Repositories\AbstractEloquentRepository;

class EloquentGuestRepository extends AbstractEloquentRepository implements GuestRepository
{
    protected $guest;

    public function __construct(Guest $model)
    {
        $this->model = $model;
    }

    public function create($params)
    {
        $guest = $this->model->create($params);
        return $guest;
    }
}