<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Genre extends Model
    {
        use HasFactory;

        protected $fillable = [
            'name',
            'display_name',
            'total_books',
        ];

        protected $hidden = [
            "id",
            "name",
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

        public function books(){
            return $this->hasMany(Book::class);
        }


    }
