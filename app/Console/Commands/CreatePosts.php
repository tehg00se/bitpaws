<?php

namespace App\Console\Commands;

use Event;
use Log;
use App\Models\User;
use App\Models\Posts\Comment;
use App\Events\PostWasMade;
use App\Models\Animals\Pet;
use App\Models\Posts\Post;
use Faker\Factory as Faker;
use Illuminate\Console\Command;

class CreatePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createPosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create lost and found posts for pets associated with users.';

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

        $pet = new Pet;
        $total_posts = rand(1,6);

        $pets = $pet->limit($total_posts)->orderByRaw("RAND()")->get();


         foreach($pets as $pet) {

               $post = new Post;

               $post->pet_id = $pet->id;
               $post->post_title = $faker->word;
               $post->post_content = $faker->paragraph;
               $post->pet_status = rand(1,2);
               $post->reported_at = $faker->dateTime;
               $post->save();

               $post->coordinates()->create(
                   [
                       'latitude' => $faker->latitude,
                       'longitude' => $faker->longitude
                   ]
               );

               $post->photos()->create(
                   [
                       'path' => $faker->imageUrl('400', '200', 'animals')
                   ]
               );

             $user = new User;
             $total_comments = rand(1,25);

             $users = $user->limit($total_comments)->orderByRaw("RAND()")->get();

             foreach($users as $user) {

                 $comment = new Comment;
                 $comment->content = $faker->paragraph;
                 $comment->user_id = $user->id;

                 $post->comments()->save($comment);

             }

               Event::fire(new PostWasMade($post));

           }


    }
}
