<?php namespace App\Http\Controllers\Api;

use App\Repositories\Invitation\InvitationRepository;

class InvitationController extends ApiController
{
    protected $repo;

    public function __construct(InvitationRepository $invitation) {
        $this->repo = $invitation;
    }

    public function getByCode($code)
    {
        if ($invitation = $this->repo->getByCode($code))
        {
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