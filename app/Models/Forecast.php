<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Forecast extends Model
    {
        use HasFactory;

        protected $hidden = [
            "id",
            "created_at",
            "updated_at",
        ];

        protected static function boot()
        {
            parent::boot();

            static::creating(function ($model) {
                $model->uuid = guidv4();
            });
        }

        public function weather_trails()
        {
            return $this->hasMany(Weather::class);
        }
    }
