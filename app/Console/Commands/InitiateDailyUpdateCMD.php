<?php

namespace App\Console\Commands;

use App\Jobs\InitiateDailyUpdateJB;
use Illuminate\Console\Command;

class InitiateDailyUpdateCMD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initiate:weather-forecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        InitiateDailyUpdateJB::dispatch();
        return 0;
    }
}
