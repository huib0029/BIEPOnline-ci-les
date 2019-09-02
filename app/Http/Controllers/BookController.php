<?php

namespace App\Http\Controllers;


use App\Book;
use App\Category;
use App\Author;
use App\Copy;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('book/index', [
            'books' => Book::orderBy('title', 'asc')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book/create', [
            'categories' => Category::orderBy('name', 'asc')->pluck('name', 'id'),
            'authors' => Author::orderBy('name', 'asc')->pluck('name', 'id'),

        ]);
        //Create a new book

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if the form was correctly filled in
        $this->validate($request, [
            'title' => 'required|max:255',
            'isbn' => 'required|min:10|max:13|unique:books',
            'author_id' => 'required|max:255',
            'category_id' => 'required',
        ]);

        // Create new book object with the info in the request
        $book = Book::create([
            'title' => $request ['title'],
            'isbn' => $request ['isbn'],
            'author_id' => $request ['author'],
            'category_id' => $request ['category_id'],
        ]);

        //Find request of category_id
        $category = Category::find($request ['category_id']);

        //Associate the Category to book
        $book->category()->associate($category);

        //Find request of author_id
        $author = Author::find($request ['author_id']);

        //If author does not exists create new author
        if (empty($author)) {
            $author = Author::firstOrCreate([
                'name' => $request ['author_id']
            ]);
        }

        //Associate the Author to the book
        $book->author()->associate($author);

        // Save this object in the database
        $book->save();

        // Redirect to the book.index page with a success message.
        return redirect('book')->with('success', $book->title . ' is toegevoegd.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('book/show', [
            'book' => Book::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('book/edit', [
            'book' => Book::findOrFail($id),
            'categories' => Category::orderBy('name', 'asc')->pluck('name', 'id'),
            'authors' => Author::orderBy('name', 'asc')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // Check if the form was correctly filled in
        $this->validate($request, [
            'title' => 'required|max:255',
            'isbn' => 'required|min:10|max:13',
            'author_id' => 'required|max:255',
            'category_id' => 'required|max:255',

        ]);

        $book = Book::findorfail($id);
        $book->title = $request ['title'];
        $book->isbn = $request ['isbn'];

        //Associate the Category to book
        $category = Category::find($request ['category_id']);
        $book->category()->associate($category);

        //Associate the Author to book
        $author = Author::find($request ['author_id']);
        $book->author()->associate($author);

        // Save the changes in the database
        $book->save();

        // Redirect to the book.index page with a success message.
        return redirect('book')->with('success', $book->title . ' is bijgewerkt.');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the book object in the database
        $book = Book::findorfail($id);

        // Remove the book from the database
        $book->delete();

        // Remove all copies with book id $id
        $deleteCopies = Copy::where('book_id', '=', $id)->delete();

        // Redirect to the book.index page with a success message.
        return redirect('book')->with('success', $book->title . ' is verwijderd.');
        //
    }
}
