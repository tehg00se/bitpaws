<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        Commands\RegisterUsers::class,
        Commands\CreateProfiles::class,
        Commands\CreatePets::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('registerUsers')->everyThirtyMinutes();

        $schedule->command('createProfiles')->everyThirtyMinutes();

        $schedule->command('createPets')->everyThirtyMinutes();

    }
}
