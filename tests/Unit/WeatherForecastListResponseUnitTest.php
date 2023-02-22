<?php

    namespace Tests\Unit;

    use Tests\TestCase;

    class WeatherForecastListResponseUnitTest extends TestCase
    {
        /**
         * A basic unit test example.
         *
         * @return void
         */
        public function test_retrieve_weather_forecast()
        {

            $this->withoutExceptionHandling();

            $payload = [
                'forecast_date' => '22-02-2023',
            ];

            $response = $this->json('POST', route('v1.weather.forecasts.store'), $payload);

            $response->assertStatus(200);
            $response->assertJsonCount(5);

            //NOTE: These values will defer if new ones are generated from API call to weather api
            /*$response->assertJson([
                "status" => 200,
                "message" => "success",
                "details" => [
                    [
                        "uuid" => "ff99864d-46b8-4ae5-a8be-6788eea3be3d",
                        "timestamp" => 1677024000,
                        "lat" => 40.7143,
                        "lon" => -75.4999,
                        "city" => "New_York",
                        "forecast_date" => "22-02-2023",
                        "temp" => 277.83,
                        "pressure" => 1003,
                        "humidity" => 81,
                        "dew_point" => 274.85,
                        "uvi" => 0,
                        "clouds" => 0,
                        "visibility" => 10000,
                        "wind_speed" => 0.45,
                        "wind_deg" => 360,
                        "wind_gust" => 1.34,
                        "sea_level" => null,
                        "grnd_level" => null,
                        "weather_forecast_update_tracker_id" => null,
                        "weather_trails" => [
                            [
                                "uuid" => "9d139790-fe3e-474b-8544-7afe70574b22",
                                "main" => "Clear",
                                "description" => "clear sky",
                                "display_icon" => "01n",
                            ],
                        ],
                    ],
                ],
            ]);*/

        }
    }
