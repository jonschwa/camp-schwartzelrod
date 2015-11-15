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
                    'is_staying' => intval($guest['isStaying']),
                    'interested_archery' => intval($guest['archery']),
                    'interested_swimming' => intval($guest['swimming']),
                    'interested_boating' => intval($guest['boating']),
                    'interested_good_time' => intval($guest['goodTime']),
                    'interested_arts_and_crafts' => intval($guest['artsAndCrafts']),
                    'interested_sports' => intval($guest['sports'])
                ]);
                $guests[] = $newGuest->toArray();
            } else {
                $existingGuest = $this->findById($guest['guestId']);
                //update the guest.
                $existingGuest->update([
                    'first_name' => $guest['firstName'],
                    'last_name' => $guest['lastName'],
                    'is_adult' => intval($guest['isAdult']),
                    'is_staying' => intval($guest['isStaying']),
                    'interested_archery' => intval($guest['archery']),
                    'interested_swimming' => intval($guest['swimming']),
                    'interested_boating' => intval($guest['boating']),
                    'interested_good_time' => intval($guest['goodTime']),
                    'interested_arts_and_crafts' => intval($guest['artsAndCrafts']),
                    'interested_sports' => intval($guest['sports'])
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