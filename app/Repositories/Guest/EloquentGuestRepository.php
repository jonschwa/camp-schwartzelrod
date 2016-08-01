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
                    'in_cabin' => $guest['stayingIn'] == 'cabin' ? 1 : 0,
                    'friday_bbq' => intval($guest['fridayBBQ']),
                    'fri_camp_activities' => intval($guest['friCampActivities']),
                    'sat_camp_activities' => intval($guest['satCampActivities']),
                    'wedding_attend' => intval($guest['weddingAttend']),
                    'cabin_adventure_level' => (intval($guest['isStaying']) == 0 || $guest['cabinAdventureLevel'] == 0) ? null : $guest['cabinAdventureLevel'],
                    'desired_bunkmates' => intval($guest['isStaying']) == 0 ? null : $guest['desiredBunkMates'],
                    'byo_plan' => intval($guest['isStaying']) == 0 ? null : $guest['byoPlan'],
                    'hotel_choice' => intval($guest['isStaying']) == 0 ? $guest['hotelChoice'] : null,
                    'interested_archery' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['archery']) : 0,
                    'interested_swimming' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['swimming']) : 0,
                    'interested_boating' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['boating']) : 0,
                    'interested_arts_and_crafts' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['artsAndCrafts']) : 0,
                    'interested_soccer' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['soccer']) : 0,
                    'interested_tennis' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ?  intval($guest['tennis']) : 0,
                    'interested_volleyball' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['volleyball']) : 0,
                    'interested_football' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['football']) : 0,
                    'interested_frisbee' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ?  intval($guest['frisbee']) :0,
                    'interested_kickball' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['kickball']) : 0,
                    'interested_capture_the_flag' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['ctf']) : 0,
                    'interested_scavenger_hunt' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['scavengerHunt']) : 0
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
                    'in_cabin' => $guest['stayingIn'] == 'cabin' ? 1 : 0,
                    'friday_bbq' => intval($guest['fridayBBQ']),
                    'fri_camp_activities' => intval($guest['friCampActivities']),
                    'sat_camp_activities' => intval($guest['satCampActivities']),
                    'wedding_attend' => intval($guest['weddingAttend']),
                    'cabin_adventure_level' => (intval($guest['isStaying']) == 0 || $guest['cabinAdventureLevel'] == 0) ? null : $guest['cabinAdventureLevel'],
                    'desired_bunkmates' => intval($guest['isStaying']) == 0 ? null : $guest['desiredBunkMates'],
                    'byo_plan' => intval($guest['isStaying']) == 0 ? null : $guest['byoPlan'],
                    'hotel_choice' => intval($guest['isStaying']) == 0 ? $guest['hotelChoice'] : null,
                    'interested_archery' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['archery']) : 0,
                    'interested_swimming' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['swimming']) : 0,
                    'interested_boating' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['boating']) : 0,
                    'interested_arts_and_crafts' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['artsAndCrafts']) : 0,
                    'interested_soccer' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['soccer']) : 0,
                    'interested_tennis' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ?  intval($guest['tennis']) : 0,
                    'interested_volleyball' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['volleyball']) : 0,
                    'interested_football' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['football']) : 0,
                    'interested_frisbee' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ?  intval($guest['frisbee']) :0,
                    'interested_kickball' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['kickball']) : 0,
                    'interested_capture_the_flag' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['ctf']) : 0,
                    'interested_scavenger_hunt' => intval($guest['friCampActivities']) == 1 || intval($guest['satCampActivities']) == 1 ? intval($guest['scavengerHunt']) : 0
                ]);
                $existingGuest->save();
                $guests[] = $existingGuest->toArray();
            }
        }
        if(!is_null($user->rsvp)) {
            $user->rsvp()->update(array('updated_at' => date('Y-m-d H:i:s')));
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