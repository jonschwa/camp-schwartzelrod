<?php namespace App\Repositories\Rsvp;

use App\Rsvp;
use App\Repositories\User\UserRepository;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentRsvpRepository extends AbstractEloquentRepository implements RsvpRepository
{
    protected $model;
    protected $user;

    public function __construct(Rsvp $model)
    {
        $this->model = $model;
    }

    public function saveRsvp($user, $params)
    {
        try {
            $rsvp = $this->model->where('user_id', '=', $user->id)->firstOrFail();
            $rsvp->will_attend = $params['will_attend'];
            if(isset($params['num_guests'])) {
                $rsvp->num_guests = $params['num_guests'];
            }
            $rsvp->comment = isset($params['comment']) ? $params['comment'] : null;

            $rsvp->save();
        }
        catch(ModelNotFoundException $e) {
            $rsvp = $user->rsvp()->create($params);
        }
        return $rsvp;
    }

    public function getAllRsvps()
    {
        $allRsvps = $this->model->with(['user' => function($q) {
            $q->with('guests');
        }])->get();

        $allRsvps->each(function($rsvp) {
            $adults = $rsvp->user->guests->filter(function($guest) {
                if($guest->is_adult == 1) {
                    return $guest;
                }
            });
            $rsvp->user->num_adults = $adults->count();
            if($rsvp->user->guests->count() < $adults->count()) {
                $kids = $rsvp->user->guests->filter(function($guest) {
                    if($guest->is_adult == 0) {
                        return $guest;
                    }
                });
                $rsvp->user->num_kids = $kids->count();
            }
            else {
                $rsvp->user->num_kids = 0;
            }
        });

        $rsvpsYes = $allRsvps->filter(function ($rsvp) {
            if($rsvp->will_attend == 1){
                return $rsvp;
            }
        });
        $rsvpsNo = $allRsvps->filter(function ($rsvp) {
            if($rsvp->will_attend == 0){
                return $rsvp;
            }
        });
        $rsvpsMaybe = $allRsvps->filter(function ($rsvp) {
            if($rsvp->will_attend == -1){
                return $rsvp;
            }
        });
        $rsvpsOptOut = $allRsvps->filter(function ($rsvp) {
            if($rsvp->will_attend == -2){
                return $rsvp;
            }
        });

        $rsvpCollections = [
            'all' => $allRsvps,
            'yes' => $rsvpsYes,
            'maybe' => $rsvpsMaybe,
            'no' => $rsvpsNo,
            'optOut' => $rsvpsOptOut
         ];

        return $rsvpCollections;
    }
}