<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','author','genre_id','publisher_id'
    ];

    protected $hidden = [
        "id",
        "genre_id",
        "publisher_id",
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

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
