<?php

    namespace App\Jobs;

    use App\Models\Forecast;
    use App\Models\Weather;
    use App\Models\WeatherForecastUpdateTracker;
    use Carbon\Carbon;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldBeUnique;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\Log;
    use Throwable;

    class RetrieveFourDailyWeatherForcastJB implements ShouldQueue
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
                $tracker = WeatherForecastUpdateTracker::where('started_at', 'like',Carbon::now()->format('Y-m-d H'))
                    ->where('status', 'NEW')
                    ->first();

                if ($tracker) {
                    $response = merge_remote_forecast($tracker->created_at->format('Y-m-d H:i:s'));
                    $forecasts = process_forecast_data($response);
                    $tracker->status = 'PROCESSING';
                    save_forecasts($forecasts, $tracker->id);

                    $tracker->status = 'COMPLETED';
                    $tracker->ended_at = Carbon::now()->format('Y-m-d H:i:s');
                    $tracker->save();
                }

            } catch (Throwable $throwable) {
                Log::error(clean_throwable_only($throwable));
            }

        }
    }
