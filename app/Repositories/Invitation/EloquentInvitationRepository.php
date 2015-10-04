<?php namespace App\Repositories\Invitation;

use App\Invitation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentInvitationRepository implements InvitationRepository
{
    protected $model;

    public function __construct(Invitation $model) {
        $this->model = $model;
    }

    public function getInvitationByCode($invitationCode) {
        try {
            $invitation = $this->model->where('code', '=', $invitationCode)
                                      ->with('user')
                                      ->with('rsvp')
                                      ->firstOrFail();
        }
        catch(ModelNotFoundException $e) {
            return false;
        }
        return $invitation;
    }
}