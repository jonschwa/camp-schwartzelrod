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

    public function createOrUpdate($user, $guestData)
    {
        $guests = [];
        foreach ($guestData as $guest) {
            if ($guest['guestId'] == 0) {
                //make a new guest.
                $newGuest = $this->model->create([
                    'first_name' => $guest['firstName'] ,
                    'user_id' => $user->id,
                    'last_name' => $guest['lastName'],
                    'is_adult' => intval($guest['isAdult']),
                    'child_age' => intval($guest['childAge']) != 0 ? intval($guest['childAge']) : null,
                    'is_staying' => intval($guest['isStaying']),
                    'friday_bbq' => intval($guest['fridayBBQ']),
                    'fri_camp_activities' => intval($guest['friCampActivities']),
                    'sat_camp_activities' => intval($guest['satCampActivities']),
                    'wedding_attend' => intval($guest['weddingAttend']),
                    'cabin_adventure_level' => (intval($guest['isStaying']) == 0 || $guest['cabinAdventureLevel'] == 0) ? null : $guest['cabinAdventureLevel'],
                    'desired_bunkmates' => intval($guest['isStaying']) == 0 ? null : $guest['desiredBunkMates'],
                    'interested_archery' => intval($guest['archery']),
                    'interested_swimming' => intval($guest['swimming']),
                    'interested_boating' => intval($guest['boating']),
                    'interested_arts_and_crafts' => intval($guest['artsAndCrafts']),
                    'interested_soccer' => intval($guest['soccer']),
                    'interested_tennis' => intval($guest['tennis']),
                    'interested_volleyball' => intval($guest['volleyball']),
                    'interested_football' => intval($guest['football']),
                    'interested_frisbee' => intval($guest['frisbee']),
                    'interested_kickball' => intval($guest['kickball']),
                    'interested_capture_the_flag' => intval($guest['ctf']),
                    'interested_scavenger_hunt' => intval($guest['scavengerHunt'])
                ]);
                $guests[] = $newGuest->toArray();
            } else {
                $existingGuest = $this->findById($guest['guestId']);
                //update the guest.
                $existingGuest->update([
                    'first_name' => $guest['firstName'],
                    'last_name' => $guest['lastName'],
                    'is_adult' => intval($guest['isAdult']),
                    'child_age' => intval($guest['childAge']) != 0 ? intval($guest['childAge']) : null,
                    'is_staying' => intval($guest['isStaying']),
                    'friday_bbq' => intval($guest['fridayBBQ']),
                    'fri_camp_activities' => intval($guest['friCampActivities']),
                    'sat_camp_activities' => intval($guest['satCampActivities']),
                    'wedding_attend' => intval($guest['weddingAttend']),
                    'cabin_adventure_level' => (intval($guest['isStaying']) == 0 || $guest['cabinAdventureLevel'] == 0) ? null : $guest['cabinAdventureLevel'],
                    'desired_bunkmates' => intval($guest['isStaying']) == 0 ? null : $guest['desiredBunkMates'],
                    'interested_archery' => intval($guest['archery']),
                    'interested_swimming' => intval($guest['swimming']),
                    'interested_boating' => intval($guest['boating']),
                    'interested_arts_and_crafts' => intval($guest['artsAndCrafts']),
                    'interested_soccer' => intval($guest['soccer']),
                    'interested_tennis' => intval($guest['tennis']),
                    'interested_volleyball' => intval($guest['volleyball']),
                    'interested_football' => intval($guest['football']),
                    'interested_frisbee' => intval($guest['frisbee']),
                    'interested_kickball' => intval($guest['kickball']),
                    'interested_capture_the_flag' => intval($guest['ctf']),
                    'interested_scavenger_hunt' => intval($guest['scavengerHunt'])
                ]);
                $existingGuest->save();
                $guests[] = $existingGuest->toArray();
            }
        }
        return $guests;
    }

    public function deleteOldGuests($user, $guests)
    {
        $guestIds = array_pluck($guests, 'id');
        $oldGuests = $this->model->where('user_id', $user->id)
                                 ->whereNotIn('id', $guestIds)->get();
        if($oldGuests->count() > 0) {
            $oldGuests->each(function($guest) {
                $guest->delete();
            });
        }
        return true;
    }

}