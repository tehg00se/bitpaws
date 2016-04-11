<?php

namespace App\Console\Commands;

use Event;
use App\Events\PetWasCreated;
use App\Models\User;
use App\Models\Animals\Pet;
use App\Models\Animals\Breed;
use App\Models\Animals\Species;
use DB;

use Faker\Factory as Faker;

use Illuminate\Console\Command;

class CreatePets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createPets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates random pets associated with random users.';

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

        $faker = Faker::create();

        $ids = DB::select('select id from users ORDER BY id DESC LIMIT 0,10');

        foreach($ids as $k => $v) {

            $user = new User;
            $user = $user->find($v->id);

            $pet = new Pet;
            $pet->name = $faker->firstName;
            $pet->description = $faker->paragraph;
            $pet->dob = $faker->date('Y-m-d');
            $pet->story = $faker->sentence;
            $species = rand(1,2);
            $pet->species_id = $species;

            $total_mix = rand(1,4);
            $breeds = DB::select("select * from breeds WHERE species_id = '$pet->species_id' ");
            $pet_breeds = array_rand($breeds, $total_mix);

            $pet = $user->pets()->save($pet);

            $pet->breeds()->attach($pet_breeds);

            Event::fire(new PetWasCreated($pet));

        }

    }
}
