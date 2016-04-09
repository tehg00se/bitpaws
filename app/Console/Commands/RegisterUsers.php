<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use App\Models\User;
use Log;

class RegisterUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registerUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registers 10 users to the database';

    /**
     * @return string
     */
    public function handle()
    {

        $users = [];

        $faker = Faker::create();

        foreach (range(1,10) as $index) {

            $user = new User;

            $user->username = $faker->username;
            $user->email = $faker->email;
            $user->password = bcrypt('secret');

            $id = $user->save();

            array_push($users, $id);
        }

        Log::info('Created users.' . json_encode(['users' => $users]));

        return true;

    }
}
