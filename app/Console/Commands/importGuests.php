<?php

namespace App\Console\Commands;

use Hash;
use Illuminate\Console\Command;
use App\Repositories\User\UserRepository;
use App\Repositories\Guest\GuestRepository;
use App\Repositories\Invitation\InvitationRepository;

class importGuests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guests:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all the guests into the database.';

    protected $user;
    protected $guest;
    protected $invitation;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user,
                                GuestRepository $guest,
                                InvitationRepository $invitation)
    {
        parent::__construct();
        $this->user = $user;
        $this->guest = $guest;
        $this->invitation = $invitation;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $guestData = $this->readGuestCsv();
    }


    private function readGuestCsv()
    {
        $file = fopen(base_path() . '/wedding_list.csv', 'r');
        $i=0;
        while (($line = fgetcsv($file)) !== FALSE) {
            if($i > 0) {
                //$line is an array of the csv elements
                //dd($line);
                $guestData = $this->parseGuests(['adults' => $line[17], 'children' => $line[18]]);
                //dd($guestData);
                $userName = $this->parseUserName($line[16]);
                $userEmail = $line[6];

                $userData = [
                    'first_name' => $userName['first'],
                    'last_name'  => $userName['last'],
                    'email'      => empty($userEmail) ? null : $userEmail,
                    'password'   => Hash::make('password'),
                    //'active'     => false,
                    'max_guests' => $guestData['total']
                ];

                $this->info('@@@@@@@@@@@    creating user: '.$userData['email'] .'    @@@@@@@@@@@');
                $user = $this->user->create($userData);

                if(!empty($guestData['adults'])) {
                    $this->info('#############    adding adult guests    ##############');
                    foreach($guestData['adults'] as $guest) {
                        $this->addGuestToUser($guest, $user, $adult = true);
                    }
                }

                if(!empty($guestData['children'])) {
                    $this->info('<<<<<<<<<<    adding child guests    >>>>>>>>>>');
                    foreach($guestData['children'] as $guest) {
                        $this->addGuestToUser($guest, $user, $adult = false);
                    }
                }

                $this->info('~~~~~~~~~~~    generating invitation    ~~~~~~~~~~~');
                $user->invitation()->create([
                    'code' => $this->generateInviteCode($user)
                ]);
                //dd();
                $user->active = 0;
                $user->save();
            }
            $i++;
        }
        fclose($file);
    }

    private function parseUserName($name)
    {
        $nameArr = explode(' ', $name);
        return [
            'first' => trim($nameArr[0]),
            'last'  => trim($nameArr[1])
        ];
    }

    private function parseGuests($guestArr)
    {
        $children = $adults = array();
        if(!empty($guestArr['adults'])) {
            $adults = $this->splitGuests($guestArr['adults']);
        }
        if(!empty($guestArr['children'])) {
            $children = $this->splitGuests($guestArr['children']);
        }
        $guests = [
            'adults' => $adults,
            'children' => $children,
            'total' => count($adults) + count($children)
        ];
        return $guests;
    }

    private function splitGuests($str)
    {
        $names = explode(' | ', $str);
        $guests = [];
        foreach($names as $name) {
            $nameSplit = explode(' ', $name);
            $guests[] = [
                'first' => trim($nameSplit[0]),
                'last'  => trim($nameSplit[1])
            ];
        }
        return $guests;
    }

    private function addGuestToUser($guest, $user, $adult=true) {
        $user->guests()->create([
            'first_name' => $guest['first'],
            'last_name'  => $guest['last'],
            'is_adult'   => $adult ? 1 : 0
        ]);
    }

    public function generateInviteCode($user)
    {
        return substr(sha1(time() . $user->first_name . $user->email),0,8);
    }
}
