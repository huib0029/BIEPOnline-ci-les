<?php

namespace App\Http\Controllers;

use App\Book;
use App\Copy;
use App\Location;
use App\Status;
use Illuminate\Http\Request;


class CopyController extends Controller
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
        return view('copy/index', [
            'copies' => Copy::orderBy('datebought', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('copy/create', [

            'locations' => Location::orderBy('name', 'asc')->pluck('name', 'id'),
            'books' => Book::orderBy('title', 'asc')->pluck('title', 'id', 'isbn'),
            'statuses' => Status::orderBy('status', 'asc')->pluck('status', 'id'),
        ]);
        //create a new copy
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
            'datebought' => 'required|date',
        ]);

        // Create new Copy object with the info in the request
        $copy = Copy::create([
            'datebought' => $request ['datebought'],
        ]);

        //find requests of location_id, book_id and status_id
        $location = Location::find($request ['location_id']);
        $book = Book::find($request ['book_id']);
        $status = Status::find($request ['status_id']);

        //Associate the location, book and status to copy
        $copy->location()->associate($location);
        $copy->book()->associate($book);
        $copy->status()->associate($status);

        // Save this object in the database
        $copy->save();

        // Redirect to the copy.index page with a success message.
        return redirect('copy')->with('success', 'Het exemplaar is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('copy/show', [
            'copy' => Copy::findOrFail($id),
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
        return view('copy/edit', [
            'copy' => Copy::findOrFail($id),
            'locations' => Location::orderBy('name', 'asc')->pluck('name', 'id'),
            'books' => Book::orderBy('title', 'asc')->pluck('title', 'id', 'isbn'),
            'statuses' => Status::orderBy('status', 'asc')->pluck('status', 'id'),
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
            'id' => 'max:255',
            'datebought' => 'required|date',
        ]);
        $copy = Copy::findorfail($id);
        $copy->datebought = $request ['datebought'];

        //find requests of location_id, book_id and status_id
        $location = Location::find($request ['location_id']);
        $book = Book::find($request ['book_id']);
        $status = Status::find($request ['status_id']);

        //Associate the location, book and status to copy
        $copy->book()->associate($book);
        $copy->location()->associate($location);
        $copy->status()->associate($status);

        // Save the changes in the database
        $copy->save();

        // Redirect to the copy.index page with a success message.
        return redirect('copy')->with('success', 'Het exemplaar is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the copy object in the database
        $copy = Copy::findorfail($id);

        // Remove the copy from the database
        $copy->delete();

        // Redirect to the copy.index page with a success message.
        return redirect('copy')->with('success', 'Het exemplaar is verwijderd.');
        //
    }
}
