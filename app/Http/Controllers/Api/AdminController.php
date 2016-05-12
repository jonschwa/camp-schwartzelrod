<?php namespace App\Http\Controllers\Api;

use App\Repositories\Rsvp\RsvpRepository;

class AdminController extends ApiController
{
    protected $user;
    protected $guest;
    protected $rsvp;

    public function __construct(RsvpRepository $rsvp)
    {
        $this->middleware('admin');
        $this->rsvp = $rsvp;
    }

    public function activityCount()
    {
        $allRsvps =  $this->rsvp->getAllRsvps();

        $activityCounts = ['raw' => $allRsvps['numbers']['activities']['user_selections'],
                           'chart' => $this->getChartData($allRsvps['numbers']['activities']['user_selections'])
        ];

        return $this->apiResponse("ok", $activityCounts);
    }

    private function getChartData($count)
    {
        return array('labels' => array_keys($count),
                     'datasets' =>  [['label' => '#',
                                      'data' => array_values($count)]
                     ]);
    }
}