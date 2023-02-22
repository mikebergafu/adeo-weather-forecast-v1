<?php

    namespace App\Console;

    use App\Console\Commands\InitiateDailyUpdateCMD;
    use App\Console\Commands\RetrieveFourDailyWeatherForcastCMD;
    use Illuminate\Console\Scheduling\Schedule;
    use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

    class Kernel extends ConsoleKernel
    {
        protected $commands = [
            RetrieveFourDailyWeatherForcastCMD::class,
            InitiateDailyUpdateCMD::class
        ];
        /**
         * Define the application's command schedule.
         *
         * @param  Schedule  $schedule
         * @return void
         */
        protected function schedule(Schedule $schedule)
        {
            $schedule->command('initiate:weather-forecast')->everySixHours();
            $schedule->command('receive:forecast')->dailyAt('18:03');

        }

        /**
         * Register the commands for the application.
         *
         * @return void
         */
        protected function commands()
        {
            $this->load(__DIR__.'/Commands');

            require base_path('routes/console.php');
        }
    }
