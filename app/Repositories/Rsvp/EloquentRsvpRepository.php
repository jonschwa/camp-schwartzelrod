<?php namespace App\Repositories\Rsvp;

use App\Rsvp;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentRsvpRepository extends AbstractEloquentRepository implements RsvpRepository
{
    protected $model;

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
}