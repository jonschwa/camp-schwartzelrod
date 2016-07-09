<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\User\UserRepository;
use App\Repositories\Guest\GuestRepository;
use App\Repositories\Invitation\InvitationRepository;

class GenerateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guests:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user!';

    protected $user;
    protected $guestList = [];

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
        $userData = $this->requestUserData();
        $this->requestGuestData($this->guestList);

        $this->info('creating user...');
        $user = $this->generateUser($userData);
        $this->info('adding guests...');
        if(!empty($this->guestList)) {
            foreach($this->guestList as $guest) {
                $this->addGuestToUser($guest, $user);
            }
        }
        $this->info('done!');
        $this->info('generating invitation...');
        $user->invitation()->create([
            'code' => $this->generateInviteCode($user)
        ]);
        $this->info('done!');
        $this->info($user->invitation->code);
    }

    private function requestUserData() {
        $firstName = $this->ask('First name?');
        $lastName = $this->ask('Last name?');
        $email = $this->ask('Email?');
        $numGuests = $this->ask('How many guests?');

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'max_guests' => $numGuests
        ];
    }

    private function requestGuestData($guestArray=[], $iterate=false) {
        if($iterate || empty($this->guestList)) {
            $guest = $this->getGuestData();
            if ($guest) {
                $this->guestList[] = $guest;
                $this->requestGuestData($guestArray, true);
            } else {
                $this->info('ok thats enough guests!');
            }
        }
        return $guestArray;
    }

    private function getGuestData() {
        $addGuest = $this->ask('Add Guest? (y or n)');

        if($addGuest == 'y' || $addGuest == 'Y') {
            $firstName = $this->ask('First name?');
            $lastName = $this->ask('Last name?');
            $isAdult = $this->ask('Adult? (1 or 0)');

            return [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'is_adult' => $isAdult
            ];
        }
        else {
            return false;
        }
    }

    private function generateUser($data) {
        $userData = [
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => \Hash::make('password'),
            'max_guests' => $data['max_guests'],
        ];

        $this->info('@@@@@@@@@@@    creating user: '.$userData['email'] .'    @@@@@@@@@@@');
        if($user = $this->user->create($userData)) {
            $this->info('done!');
            return $user;
        }
    }

    private function addGuestToUser($guest, $user, $adult=true) {
        if($user->guests()->create($guest)) {
            $this->info('Guest added!');
        }
    }

    public function generateInviteCode($user)
    {
        return substr(sha1($user->first_name . $user->email),0,8);
    }
}