<?php

    namespace App\Jobs;

    use App\Models\WeatherForecastUpdateTracker;
    use Carbon\Carbon;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\Log;
    use Throwable;

    class InitiateDailyUpdateJB implements ShouldQueue
    {
        use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        /**
         * Create a new job instance.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        /**
         * Execute the job.
         *
         * @return void
         */
        public function handle()
        {
            try {
                $datum = new WeatherForecastUpdateTracker();
                $datum->started_at = Carbon::now()->format('Y-m-d H:i:s');
                $datum->save();
            } catch (Throwable $throwable) {
                Log::info(clean_throwable_only($throwable));
            }
        }
    }
