<?php

    namespace App\Imports;

    use App\Models\Book;
    use App\Models\Genre;
    use App\Models\Publisher;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Collection;
    use Maatwebsite\Excel\Concerns\ToCollection;
    use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
    use Maatwebsite\Excel\Concerns\WithStartRow;

    class BooksImport implements ToCollection, WithStartRow, WithCustomCsvSettings
    {
        public function startRow(): int
        {
            return 2;
        }

        public function getCsvSettings(): array
        {
            return [
                'delimiter' => ',',
            ];
        }

        /**
         * @param  Collection  $rows
         * @return void
         */

        public function collection(Collection $rows)
        {
            // The approach is to convert the Incoming data into
            // ...appropriate Pivot Tables in order to avoid duplications

            foreach ($rows as $row) {
                //Cap Each Word of Genre for Human Readability
                $processed_genre_name = ucwords(str_replace('_', ' ', $row[2]));
                //Check if Genre is Already Saved
                if (!Genre::whereDisplayName($processed_genre_name)->exists()) {
                    $this->store_new_genre($row, $processed_genre_name);
                }
                //Check if Publisher is Already Saved
                if (!Publisher::whereName($row[4])->exists()) {
                    $this->store_new_publisher($row);
                }

                //Fetch saved Publish and Genre
                $genre = Genre::where('display_name', $processed_genre_name)->first();
                $publisher = Publisher::where('name', $row[4])->first();

                //Check if Genre and  Publisher exist in oder to save the new Book
                if ($genre && $publisher) {
                    if ($this->store_new_book($row, $genre->id, $publisher->id)) {
                        //Increment the Uploaded book count if new book is saved
                        $genre->total_books += 1;
                        $genre->save();
                    }
                }
            }
        }

        private function store_new_genre($incoming_genre, $processed_genre_name)
        {
            $genre = new Genre();
            $genre->name = $incoming_genre[2];
            $genre->display_name = $processed_genre_name;
            $genre->save();
        }

        private function store_new_publisher($incoming_publisher)
        {
            $publisher = new Publisher();
            $publisher->name = $incoming_publisher[4];
            $publisher->save();

        }

        private function store_new_book($incoming, $genre_id, $publisher_id)
        {
            $book = new Book();
            $book->title = $incoming['0'];
            $book->author = $incoming['1'] ?? null;
            $book->genre_id = $genre_id;
            $book->publisher_id = $publisher_id;
            return $book->save();

        }

    }


