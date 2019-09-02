<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
        return view('author/index', [
            'authors' => Author::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author/create', [
            'authors' => Author::orderBy('name', 'asc')->pluck('name'),
        ]);
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
            'name' => 'required|max:255|unique:authors',
        ]);
        // Create new book object with the info in the request
        $author = Author::create([
            'name' => $request ['name'],

        ]);

        // Save this object in the database
        $author->save();
        // Redirect to the user.index page with a success message.
        return redirect('author')->with('success', $author->name . ' is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('author/show', [
            'author' => Author::findOrFail($id),
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
        return view('author/edit', [
            'author' => Author::findOrFail($id),
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
            'name' => 'required|max:255',
        ]);

        $author = Author::findorfail($id);
        $author->name = $request ['name'];
        // Save the changes in the database
        $author->save();

        // Redirect to the user.index page with a success message.
        return redirect('author')->with('success', $author->name . ' is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the user object in the database
        $author = Author::findorfail($id);
        // Remove the user from the database
        $author->delete();
        // Redirect to the user.index page with a success message.
        return redirect('author')->with('success', $author->name . ' is verwijderd.');
    }
}
