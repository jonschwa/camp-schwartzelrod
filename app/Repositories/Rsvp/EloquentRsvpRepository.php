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
        }])->orderBy('created_at', 'desc')->get();

        $allRsvps->each(function($rsvp) {
            $adults = $rsvp->user->guests->filter(function($guest) {
                if($guest->is_adult == 1) {
                    return $guest;
                }
            });
            $rsvp->user->num_adults = $adults->count();
            if($rsvp->user->guests->count() > $adults->count()) {
                $kidsCount = $rsvp->user->guests->count() - $adults->count();
                $rsvp->user->num_kids = $kidsCount;
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
            'optOut' => $rsvpsOptOut,
            'numbers' => $this->getReportNumbers($rsvpsYes)
         ];

        return $rsvpCollections;
    }

    private function getReportNumbers($rsvps)
    {
        $reportNumbers = [
            'guests' => [
                'total' => 0,
                'adults' => 0,
                'children' => 0
            ],
            'events' => [
                'wedding' => 0,
                'friday_bbq' => 0,
            ],
            'activities' => [
                'friday' => 0,
                'saturday' => 0
            ],
            'lodging' => [
                'cabin' => 0,
                'byo' => 0,
                'offsite' => 0
            ],
        ];

        foreach($rsvps as $rsvp) {
            foreach($rsvp['user']['guests'] as $guest) {
                $reportNumbers['guests']['total']++;
                //var_dump($guest);
                if($guest->is_adult == 1) {
                    $reportNumbers['guests']['adults']++;
                }
                else {
                    $reportNumbers['guests']['children']++;
                }
                if($guest->wedding_attend == 1) {
                    $reportNumbers['events']['wedding']++;
                }
                if($guest->friday_bbq == 1) {
                    $reportNumbers['events']['friday_bbq']++;
                }
                if($guest->fri_camp_activities == 1) {
                    $reportNumbers['activities']['friday']++;
                }
                if($guest->sat_camp_activities == 1) {
                    $reportNumbers['activities']['saturday']++;
                }
                if($guest->is_staying == 1) {
                    if ($guest->in_cabin == 1) {
                        $reportNumbers['lodging']['cabin']++;
                    }
                    else {
                        $reportNumbers['lodging']['byo']++;
                    }
                } else {
                    $reportNumbers['lodging']['offsite']++;
                }
            }
        }
        return $reportNumbers;
    }
}