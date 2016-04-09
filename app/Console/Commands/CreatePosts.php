<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreatePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create.posts';

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
        //
    }
}
