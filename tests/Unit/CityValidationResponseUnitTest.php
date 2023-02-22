<?php

namespace Tests\Unit;

use Tests\TestCase;

class CityValidationResponseUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_new_city_validation()
    {

        $this->withoutExceptionHandling();
        $response = $this->json('POST', route('v1.cities.store'));

        $response->assertStatus(422);
        $response->assertJson([
            "status" => 422,
            "message" => "unfulfilled requirements",
        ]);

    }
}
