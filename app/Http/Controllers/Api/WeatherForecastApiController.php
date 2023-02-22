<?php

    namespace App\Http\Controllers\Api;

    use App\Events\OnlineForecastRetrieved;
    use App\Http\Controllers\Controller;
    use App\Models\Forecast;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Throwable;

    class WeatherForecastApiController extends Controller
    {

        public function store(Request $request)
        {
            try {
                $validator = Validator::make($request->all(), [
                    'forecast_date' => 'required|date|before:tomorrow|date_format:d-m-Y',
                ]);

                if ($validator->fails()) {
                    return return_types('unfulfilled requirements', 422, $validator->errors());
                }

                $response = Forecast::whereForecastDate($request->forecast_date)->with('weather_trails');


                if ($response->count() > 0) {
                    return return_types('success', 200, $response->get());
                }

                $response = merge_remote_forecast($request->forecast_date);

                if ($response != null) {

                    $process_forecast = process_forecast_data($response);

                    event(new OnlineForecastRetrieved($process_forecast));
                    return return_types('success', 200, $process_forecast);
                }

                return return_types('no cities configured', 404);
            } catch (Throwable $e) {

                return clean_throwable($e);
            }

        }
    }
