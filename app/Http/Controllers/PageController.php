<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PageController extends Controller
{
    protected $ourStoryContent;
    protected $weddingInfoContent;
    protected $faqContent;

    public function __construct()
    {
        $this->weddingInfoContent = [
            [
                'title' => 'The Wedding',
                'subtitle' => 'Saturday September 10th, 2016',
                'body' => '<p>Our wedding will be on Lake Champlain at Camp Abnaki in North Hero, VT. Leave your stilettos and tuxedos at home - this is a more casual affair with the ceremony on grass and reception in the dining hall.</p>
                           <p>Ceremony: Time TBD<br />
                           Dinner, dancing, drinks, and a bonfire to follow</p>',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'title' => 'The Weekend',
                'subtitle' => 'Fri Sept 9th - Sun Sept 11th 2016',
                'body' => '<p>We also invite everyone to enjoy the lakeside camp property with us all weekend! If you\'re adventurous and want to stay with us at camp for the full experience–fantastic! If you can\'t wait to join in the weekend\'s festivities, but prefer to stay off site–no problem! If you\'ll be joining us for just the ceremony and reception–fabulous! We look forward to celebrating with you.</p>',
                'img'  => 'https://placehold.it/200x200'
            ],
            [
                'title' => 'Events & Activities',
                'body' => "<p>We will be hosting a Welcome BBQ on Friday, fun activities throughout the weekend, and, of course, s’mores over the campfire at night.</p>
                          <p>Lawn games, sporting equipment, and hiking trails will be available throughout the weekend. You can also just relax and enjoy the scenery!</p>
                          <p>Official schedule of events coming soon.</p>",
                'img'  => 'https://placehold.it/200x200'
            ],
        ];
    }

    public function index()
    {
        $pageContent = [
            'weddingInfoContent' => $this->weddingInfoContent,
        ];
        return view('pages.home', $pageContent);
    }

    public function opt_out()
    {
        return view('rsvp.opt-out');
    }

}