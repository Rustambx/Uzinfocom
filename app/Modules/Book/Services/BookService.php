<?php

namespace App\Modules\Book\Services;

use App\Modules\Book\Models\Book;
use App\Modules\Book\Requests\BookRequest;

class BookService
{
    public function all()
    {
        $books = Book::all();

        return $books;
    }

    public function create (BookRequest $request)
    {
        $data = $request->except('_token');

        if (Book::create($data)) {
            return ['status' => __('main.book_added')];
        } else {
            return ['error' => __('main.save_error')];
        }
    }

    public function update (BookRequest $request, Book $book)
    {
        $data = $request->except('_token', '_method');

        if ($book->update($data)) {
            return ['status' => __('main.book_edited')];
        } else {
            return ['error' => __('main.save_error')];
        }
    }

    public function destroy (Book $book)
    {
        if ($book->delete()) {
            return ['status' => __('main.book_deleted')];
        } else {
            return ['error' => __('main.deleted_error')];
        }
    }
}
