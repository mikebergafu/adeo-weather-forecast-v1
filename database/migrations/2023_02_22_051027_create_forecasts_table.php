<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->bigInteger('timestamp')->nullable();
            $table->double('lat')->nullable();
            $table->double('lon')->nullable();
            $table->string('city')->nullable();
            $table->string('forecast_date')->nullable();
            $table->double('temp')->nullable();
            $table->double('pressure')->nullable();
            $table->double('humidity')->nullable();
            $table->double('dew_point')->nullable();
            $table->double('uvi')->nullable();
            $table->double('clouds')->nullable();
            $table->double('visibility')->nullable();
            $table->double('wind_speed')->nullable();
            $table->double('wind_deg')->nullable();
            $table->double('wind_gust')->nullable();
            $table->double('sea_level')->nullable();
            $table->double('grnd_level')->nullable();
            $table->unsignedBigInteger('weather_forecast_update_tracker_id')->index('idx_weather_forecast_update_tracker_fk')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecasts');
    }
}
