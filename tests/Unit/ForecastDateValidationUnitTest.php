<?php

namespace Tests\Unit;

use Tests\TestCase;

class ForecastDateValidationUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->withoutExceptionHandling();
        $response = $this->json('POST', route('v1.weather.forecasts.store'));

        $response->assertStatus(422);
        $response->assertJson([
            "status" => 422,
            "message" => "unfulfilled requirements",
        ]);
    }
}
