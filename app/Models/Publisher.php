<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        "id",
        "uuid",
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
}
