<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;

    use App\Imports\BooksImport;
    use App\Models\Genre;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Maatwebsite\Excel\Facades\Excel;
    use Throwable;

    class BookApiController extends Controller
    {
        public function index()
        {
            try {
                $books = $this->formed_books_response();
                if ($books->count('*') < 1) {
                    return return_types('No Keywords available', 404);
                }
                return return_types('Keywords generated successfully', 200, $books->paginate(10));
            } catch (Throwable $e) {

                return clean_throwable($e);
            }
        }

        public function store(Request $request)
        {

            try {
                $validator = Validator::make($request->all(), [
                    'books' => 'required|mimes:csv,txt',
                ]);

                if ($validator->fails()) {
                    return return_types('unfulfilled requirements', 422, $validator->errors());
                }
                Excel::import(new BooksImport, $request->file('books')->store('files'));
                $keywords = $this->formed_books_response();
                return return_types('success', 200, $keywords->paginate(10));

            } catch (Throwable $e) {

                return clean_throwable($e);
            }

        }

      private function formed_books_response(): Builder
      {
          return  Genre::orderBy('total_books', 'DESC')
              ->orderBy('display_name', 'DESC')
              ->with('books', 'books.publisher')
              ->select(['genres.id', 'genres.uuid', 'genres.display_name as keyword', 'genres.total_books as total']);
      }
    }
