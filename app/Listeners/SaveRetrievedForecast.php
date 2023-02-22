<?php

    namespace App\Listeners;

    use App\Events\OnlineForecastRetrieved;
    use App\Models\Forecast;
    use App\Models\Weather;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Support\Facades\Log;
    use Throwable;

    class SaveRetrievedForecast
    {

        /**
         * Create the event listener.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        /**
         * Handle the event.
         *
         * @param  OnlineForecastRetrieved  $event
         * @return void
         */
        public function handle(OnlineForecastRetrieved $event)
        {

            try {
                $forecasts = $event->forecast_data['forecasts'];
                save_forecasts($forecasts);
            } catch (Throwable $throwable) {
                Log::error(clean_throwable_only($throwable));
            }

        }
    }
