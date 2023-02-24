<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('title', 500);
            $table->string('author',500)->nullable();
            $table->unsignedBigInteger('genre_id')->nullable()->index('idx_book_genre_fk');
            $table->unsignedBigInteger('publisher_id')->nullable()->index('idx_book_publisher_fk');
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
        Schema::dropIfExists('books');
    }
}
