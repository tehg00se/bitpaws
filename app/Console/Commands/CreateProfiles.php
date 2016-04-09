<?php

namespace App\Console\Commands;

use DB;
use App\Models\User;
use App\Models\UserProfile;
use Log;
use Faker\Factory as Faker;
use Illuminate\Console\Command;

class CreateProfiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createProfiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create random profiles for random users.e';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = [];

        $faker = Faker::create();

        $ids = DB::select('select id from users ORDER BY id DESC LIMIT 0,10');

        foreach($ids as $k => $v) {

            $user = new User;
            $user = $user->find($v->id);

            $profile = $user->profile ?: new UserProfile;

            $profile->name_first = $faker->firstName;
            $profile->name_last = $faker->lastName;
            $profile->interests = $faker->sentence;
            $profile->hobbies = $faker->sentence;

            array_push($users, $user->profile()->save($profile));

        }

        Log::info('The users returned are' . json_encode(['users' => $users]));

    }
}
