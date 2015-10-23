<?php namespace App\Repositories\Invitation;

use App\Invitation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentInvitationRepository implements InvitationRepository
{
    protected $model;

    public function __construct(Invitation $model) {
        $this->model = $model;
    }

    public function getByCode($code) {
        try {
            $invitation = $this->model->byCode($code)->with('user')->firstOrFail();
        }
        catch(ModelNotFoundException $e) {
            return false;
        }
        return $invitation;
    }
}