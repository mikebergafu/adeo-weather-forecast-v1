<?php

namespace App\Observers;

use App\Models\Genre;

class GenreObserver
{
    /**
     * Handle the Genre "created" event.
     *
     * @param  \App\Models\Genre  $genre
     * @return void
     */
    public function created(Genre $genre)
    {
        //
    }

    /**
     * Handle the Genre "updated" event.
     *
     * @param  \App\Models\Genre  $genre
     * @return void
     */
    public function updated(Genre $genre)
    {
        //
    }

    /**
     * Handle the Genre "deleted" event.
     *
     * @param  \App\Models\Genre  $genre
     * @return void
     */
    public function deleted(Genre $genre)
    {
        //
    }

    /**
     * Handle the Genre "restored" event.
     *
     * @param  \App\Models\Genre  $genre
     * @return void
     */
    public function restored(Genre $genre)
    {
        //
    }

    /**
     * Handle the Genre "force deleted" event.
     *
     * @param  \App\Models\Genre  $genre
     * @return void
     */
    public function forceDeleted(Genre $genre)
    {
        //
    }
}
