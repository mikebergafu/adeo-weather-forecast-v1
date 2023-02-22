<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherForecastUpdateTracker extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = guidv4();
        });

        // Api Call Duration
        static::updated(function ($model){
            $mmf= strtotime($model->ended_at) - strtotime(Carbon::parse($model->started_at)->format('Y-m-d H:0:0'));
            $model->process_duration = number_format($mmf/60, 2);;
        });
    }



}
