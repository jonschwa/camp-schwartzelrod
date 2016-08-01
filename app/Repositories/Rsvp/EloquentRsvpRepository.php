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
        }])->orderBy('updated_at', 'desc')->get();

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
                'saturday' => 0,
                'user_selections' => [
                    'archery' => 0,
                    'swimming' => 0,
                    'boating' => 0,
                    'arts_and_crafts' => 0,
                    'soccer' => 0,
                    'tennis' => 0,
                    'volleyball' => 0,
                    'football' => 0,
                    'frisbee' => 0,
                    'kickball' => 0,
                    'capture_the_flag' => 0,
                    'scavenger_hunt' => 0
                ]
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
                if($guest->interested_archery == 1) {
                    $reportNumbers['activities']['user_selections']['archery']++;
                }
                if($guest->interested_swimming == 1) {
                    $reportNumbers['activities']['user_selections']['swimming']++;
                }
                if($guest->interested_boating == 1) {
                    $reportNumbers['activities']['user_selections']['boating']++;
                }
                if($guest->interested_arts_and_crafts == 1) {
                    $reportNumbers['activities']['user_selections']['arts_and_crafts']++;
                }
                if($guest->interested_soccer == 1) {
                    $reportNumbers['activities']['user_selections']['soccer']++;
                }
                if($guest->interested_tennis == 1) {
                    $reportNumbers['activities']['user_selections']['tennis']++;
                }
                if($guest->interested_volleyball == 1) {
                    $reportNumbers['activities']['user_selections']['volleyball']++;
                }
                if($guest->interested_football == 1) {
                    $reportNumbers['activities']['user_selections']['football']++;
                }
                if($guest->interested_frisbee == 1) {
                    $reportNumbers['activities']['user_selections']['frisbee']++;
                }
                if($guest->interested_kickball == 1) {
                    $reportNumbers['activities']['user_selections']['kickball']++;
                }
                if($guest->interested_capture_the_flag == 1) {
                    $reportNumbers['activities']['user_selections']['capture_the_flag']++;
                }
                if($guest->interested_scavenger_hunt == 1) {
                    $reportNumbers['activities']['user_selections']['scavenger_hunt']++;
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