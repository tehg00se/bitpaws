<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreatePets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create.pets';

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
        //
    }
}