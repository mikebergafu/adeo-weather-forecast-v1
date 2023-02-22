<?php

    use App\Models\City;
    use App\Models\Forecast;
    use App\Models\Weather;
    use Illuminate\Support\Facades\Date;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Log;

    function retrieve_current_forecast_from_remote($date, $lat, $lon)
    {

        $formed_endpoint = '/data/3.0/onecall/timemachine?lat='.$lat.'&lon='.$lon.'&dt='.strtotime($date).'&appid='.env('OPEN_WEATHER_MAP_APP_ID');

        $full_url = env('OPEN_WEATHER_MAP_BASE_URL').$formed_endpoint;

        try {
            return Http::get($full_url)->json();
        } catch (Throwable $throwable) {
            Log::info(clean_throwable_only($throwable));
            return false;
        }
    }

    function merge_remote_forecast($date): array
    {
        $merger = null;

        foreach (City::whereIsActive(true)->get() as $city) {
            //User Events to save to database
            $merger[] = retrieve_current_forecast_from_remote($date, $city->lat, $city->lon);
        }

        return $merger;
    }

    function process_forecast_data($forecasts): array
    {
        $processed = [];
        foreach ($forecasts as $forecast) {
            foreach ($forecast['data'] as $data) {
                $processed['forecasts'][] = [
                    'timestamp' => $data['dt'] ?? null,
                    'lat' => $forecast['lat'] ?? null,
                    'lon' => $forecast['lon'] ?? null,
                    'city' => explode("/", $forecast['timezone'])[1],
                    'date' => date("d-m-Y", $data['dt']),
                    'temp' => $data['temp'] ?? null,
                    'pressure' => $data['pressure'] ?? null,
                    'humidity' => $data['humidity'] ?? null,
                    'dew_point' => $data['dew_point'] ?? null,
                    'uvi' => $data['uvi'] ?? null,
                    'clouds' => $data['clouds'] ?? null,
                    'visibility' => $data['visibility'] ?? null,
                    'wind_speed' => $data['wind_speed'] ?? null,
                    'wind_deg' => $data['wind_deg'] ?? null,
                    'wind_gust' => $data['wind_gust'] ?? null,
                    'weather' => load_forecast_weather($data['weather']),

                ];

            }
        }

        return $processed;
    }

    function load_forecast_weather($weather_forecasts): array
    {
        $weathers = null;
        foreach ($weather_forecasts as $weather) {
            $weathers[] = [
                'main' => $weather['main'] ?? null,
                'description' => $weather['description'] ?? null,
                'icon' => $weather['icon'] ?? null,
            ];
        }

        return $weathers;
    }

    function save_forecasts($forecasts, $tracker_id = null)
    {
        try {
            foreach ($forecasts as $forecast) {
                $datum = new Forecast();
                $datum->timestamp = $forecast['timestamp'];
                $datum->lat = $forecast['lat'];
                $datum->lon = $forecast['lon'];
                $datum->city = $forecast['city'];
                $datum->forecast_date = $forecast['date'];
                $datum->temp = $forecast['temp'];
                $datum->pressure = $forecast['pressure'];
                $datum->humidity = $forecast['humidity'];
                $datum->dew_point = $forecast['dew_point'];
                $datum->uvi = $forecast['uvi'];
                $datum->clouds = $forecast['clouds'];
                $datum->visibility = $forecast['visibility'];
                $datum->wind_speed = $forecast['wind_speed'];
                $datum->wind_deg = $forecast['wind_deg'];
                $datum->wind_gust = $forecast['wind_gust'];
                $datum->weather_forecast_update_tracker_id = $tracker_id;
                $datum->save();

                foreach ($forecast['weather'] as $weather) {
                    $weather_datum = new Weather();
                    $weather_datum->forecast_id = $datum->id;
                    $weather_datum->main = $weather['main'];
                    $weather_datum->description = $weather['description'];
                    $weather_datum->display_icon = $weather['icon'];
                    $weather_datum->save();
                }
            }
        } catch (Throwable $throwable) {
            Log::error(clean_throwable_only($throwable));
        }

    }




