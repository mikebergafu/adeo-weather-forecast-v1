<?php

    use App\Http\Controllers\Api\WeatherForecastApiController;
    use App\Http\Controllers\Api\CityApiController;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('v1')->group(function (){
    Route::prefix('weather-forecasts')->name('v1.weather.forecasts.')->group(function (){
        Route::resource('/', WeatherForecastApiController::class);
    });

    Route::prefix('cities')->name('v1.cities.')->group(function (){
       Route::resource('/', CityApiController::class);
    });
});
