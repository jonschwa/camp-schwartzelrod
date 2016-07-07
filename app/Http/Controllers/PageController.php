<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    protected $ourStoryContent;
    protected $weddingInfoContent;
    protected $faqContent;

    public function __construct()
    {
        //@todo - cache this!
        $this->weddingInfoContent = [
            [
                'title' => 'The Wedding',
                'subtitle' => 'Saturday | September 10<sup>th</sup>, 2016',
                'body' => '<p class="grey">Our wedding will be on Lake Champlain at Camp Abnaki in North Hero, VT. Leave your stilettos and tuxedos at home - this is a more casual affair with the ceremony on grass and reception in the dining hall.</p>',
                'img'  => 'https://placehold.it/200x200',
                'post-header' => 'Ceremony: Time TBD<br />
                                  Dinner, dancing, drinks, and a bonfire to follow'
            ],
            [
                'title' => 'The Weekend',
                'subtitle' => 'Friday - Sunday | September 9<sup>th</sup> - 11<sup>th</sup>, 2016',
                'body' => '<p class="grey">We also invite everyone to enjoy the lakeside camp property with us all weekend! If you\'re adventurous and want to stay with us at camp for the full experience–fantastic! If you can\'t wait to join in the weekend\'s festivities, but prefer to stay off site–no problem! If you\'ll be joining us for just the ceremony and reception–fabulous! We look forward to celebrating with you.</p>',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'title' => 'Events & Activities',
                'subtitle' => 'Official Schedule of Events coming soon',
                'body' => "<p class=\"grey\">We will be hosting a Welcome BBQ on Friday, fun activities throughout the weekend, and, of course, s’mores over the campfire at night.
                          Lawn games, sporting equipment, and hiking trails will be available throughout the weekend. You can also just relax and enjoy the scenery!</p>",
                'img'  => 'https://placehold.it/200x200'
            ],
        ];

        $this->ourStoryContent = [
            [
                'date'     => 'November 23<sup>rd</sup>, 2010',
                'event'    => 'First Message',
                'location' => '97% match on OkCupid'
            ],
            [
                'date'     => 'December 20<sup>th</sup>, 2010',
                'event'    => 'First Date',
                'location' => 'Cheesecake Factory - Bridgewater, NJ'
            ],
            [
                'date'     => 'April 2011',
                'event'    => 'It\'s Official!',
                'location' => 'New Brunswick, NJ'
            ],
            [
                'date'     => 'August 2012',
                'event'    => 'Moved in Together,<br />Combined Cats',
                'location' => 'Bound Brook, NJ'
            ],
            [
                'date'     => 'September 2012',
                'event'    => '600 Mile Road Trip',
                'location' => 'Portland Or &#10132; San Francisco CA'
            ],
            [
                'date'     => 'July 4<sup>th</sup>, 2013',
                'event'    => 'We\'re Engaged!',
                'location' => 'Grounds For Sculpture - Hamilton, NJ'
            ],
            [
                'date'     => 'January 2014',
                'event'    => 'Moved to NYC',
                'location' => 'Upper East Side, Manhattan'
            ],
            [
                'date'     => 'May 2014',
                'event'    => 'Adopted Escher',
                'location' => 'ASPCA, NYC'
            ],
            [
                'date'     => 'July 2014',
                'event'    => 'First Engagement-iversary',
                'location' => 'Climbed Mt. Bierstadt (14,065\'), CO'
            ],
            [
                'date'     => 'Today',
                'event'    => 'Living & Loving',
                'location' => 'Living in NYC and loving every minute!'
            ],

        ];
    }

    public function index(Request $request)
    {
        $rsvp = $user = null;
        if(Auth::User()) {
            $user = Auth::User();
            $rsvp = $user->rsvp;
        }

        $pageContent = [
            'weddingInfoContent' => $this->weddingInfoContent,
            'ourStoryContent'    => $this->ourStoryContent,
        ];
        return view('pages.home', [
            'pageContent' => $pageContent,
            'user' => $user,
            'rsvp' => $rsvp,
            'code' => $request->code
        ]);
    }

    public function opt_out()
    {
        return view('rsvp.opt-out');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function registry()
    {
        return view('pages.registry');
    }

}