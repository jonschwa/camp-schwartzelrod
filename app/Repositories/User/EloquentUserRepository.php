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

    public function update($userId, $params)
    {
        $user = $this->model->find($userId);
        $updateParams = [];
        if(isset($params['first_name'])) {
            $updateParams['first_name'] = $params['first_name'];
        }
        if(isset($params['last_name'])) {
            $updateParams['last_name'] = $params['last_name'];
        }
        if(isset($params['email'])) {
            $updateParams['email'] = $params['email'];
        }
        if(isset($params['phone'])) {
            $cleanPhone = preg_replace("/[^0-9.]/", "", $params['phone']);
            $updateParams['phone'] = $cleanPhone;
        }
        if(isset($params['contact_preference'])) {
            $updateParams['contact_preference'] = $params['contact_preference'];
        }

        $user->update($updateParams);
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
                            ->with('invitation')
                            ->with('rsvp')
                            ->first();
        $user->rsvp = isset($user->invitation->rsvp) ? $user->invitation->rsvp : null;
        unset($user->invitation);
        return $user;
    }

    public function syncUserGuests($user, $guests)
    {
        dd($guests);
    }

    public function checkIfEmailIsAvailable($email, $user=false)
    {
        $activeUserWithEmail = $this->model->where('email', '=', $email)
                                           ->where('active', '=', 1)
                                           ->get();
        if($activeUserWithEmail->count() > 0) {
            \Log::info($activeUserWithEmail->count());
            if($user == false) {
                return false;
            }
            else {
                if($activeUserWithEmail->first()->id != $user->id) {
                    return false;
                }
            }
        }

        return true;
    }

    public function getUsers()
    {
        $allUsers = $this->model->where('is_admin', 0)->get();

        $activeUsers = $allUsers->filter(function($user) {
            if($user->active == 1) {
                return $user;
            }
        });
        $inactiveUsers = $allUsers->filter(function($user) {
            if($user->active == 0 && $user->rsvp == null) {
                return $user;
            }
        });

        $userCollections = [
            'active' => $activeUsers,
            'inactive' => $inactiveUsers
        ];

        return $userCollections;
    }

    public function getUsersWithNoRsvp()
    {
        return $this->model->doesntHave('rsvp')->where('reminder_1', 0)->get();
    }


}