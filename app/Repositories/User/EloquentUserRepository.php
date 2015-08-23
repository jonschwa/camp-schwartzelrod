<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function addGuest($userId, array $params)
    {
        try{
            $user = $this->findById($userId);
            $user->guests()->create($params);
            return $user;
        }
        catch(ModelNotFoundException $e) {
            return false;
        }
    }
}