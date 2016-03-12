<?php namespace App\Http\Controllers\Api;

use App\AccessLog;
use App\LoggableTrait;
use App\Repositories\Invitation\InvitationRepository;

class InvitationController extends ApiController
{
    use LoggableTrait;
    protected $repo;

    public function __construct(InvitationRepository $invitation) {
        $this->repo = $invitation;
    }

    public function getByCode($code)
    {
        if ($invitation = $this->repo->getByCode($code))
        {
            $this->accessLog($invitation->id, 'invitation');

            if($invitation->user->active == 0)
            {
                return $this->apiResponse('ok', ['invitation' => $invitation, 'user']);
            }
            else
            {
                return $this->apiErrorResponse("This code has been claimed! Please try logging in <a href=".route('user.login').">here</a>");
            }
        }
        else
        {
            return $this->apiErrorResponse('Invalid invitation code');
        }
    }


}