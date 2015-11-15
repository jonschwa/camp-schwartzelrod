<?php namespace App\Repositories\User;

use App\Repositories\Guest\GuestRepository;
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

    public function findByEmail($email)
    {
        try {
            $user = $this->model->where('email', '=', $email)
                ->where('active', '=', 1)->firstOrFail();
            return $user;
        }
        catch(ModelNotFoundException $e) {
            return false;
        }
    }

    public function create($params)
    {
        $params['active'] = 1;
        if ($create = $this->model->create($params)) {
            return $create;
        }
        return false;
    }

    public function activate($userId, $params)
    {
        $user = $this->model->find($userId);
        $params['active'] = 1;
        $user->update($params);
        return $user;
    }

    public function addGuest($userId, $params)
    {
        //@todo pass a user object - 1 less query
        try{
            $user = $this->findById($userId);
            $user->guests()->create($params);
            return $user;
        }
        catch(ModelNotFoundException $e) {
            return false;
        }
    }

    public function getUserWithGuests($userId) {
        //$user = $this->model->find($userId)->with('guests')->first();
        $user = $this->model->where('id', '=', $userId)->with('guests')->first();
        return $user;
    }

    public function getAllUserInfo($userId) {
        $user = $this->model->where('id', '=', $userId)
                            ->with('guests')
                            ->with('invitation')->first();
        $user->rsvp = isset($user->invitation->rsvp) ? $user->invitation->rsvp : null;
        unset($user->invitation);
        return $user;
    }

    public function syncUserGuests($user, $guests)
    {
        dd($guests);
    }


}