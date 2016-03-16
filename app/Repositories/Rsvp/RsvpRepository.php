<?php namespace App\Repositories\Rsvp;

interface RsvpRepository
{
    public function saveRsvp($user, $params);
    public function getAllRsvps();
}