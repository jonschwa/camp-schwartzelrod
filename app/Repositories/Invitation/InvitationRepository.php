<?php namespace App\Repositories\Invitation;

interface InvitationRepository
{
    public function getInvitationByCode($invitationCode);
}