<?php

namespace App\Modules\Book\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Requests\BookRequest;
use BookService;

class BookController extends Controller
{
    public function index ()
    {
        if (!auth()->user()->can('INDEX_BOOK')) {
            return view('403');
        }

        $books = BookService::all();
        $this->view('book::index');

        return $this->render(compact('books'));
    }

    public function show (Book $book)
    {
        if (!auth()->user()->can('SHOW_BOOK')) {
            return view('403');
        }

        $this->view('book::show');

        return $this->render(compact('book'));
    }

    public function create ()
    {
        if (!auth()->user()->can('CREATE_BOOK')) {
            return view('403');
        }

        $this->view('book::create');

        return $this->render();
    }

    public function store (BookRequest $request)
    {
        if (!auth()->user()->can('CREATE_BOOK')) {
            return view('403');
        }

        $result = BookService::create($request);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('books')->with($result);
    }

    public function edit (BookRequest $request, Book $book)
    {
        if (!auth()->user()->can('UPDATE_BOOK')) {
            return view('403');
        }

        $this->view('book::edit');

        return $this->render(compact('book'));
    }

    public function update (BookRequest $request, Book $book)
    {
        if (!auth()->user()->can('UPDATE_BOOK')) {
            return view('403');
        }

        $result = BookService::update($request, $book);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('books')->with($result);
    }

    public function delete (Book $book)
    {
        if (!auth()->user()->can('DELETE_BOOK')) {
            return view('403');
        }

        $result = BookService::destroy($book);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('books')->with($result);
    }
}
