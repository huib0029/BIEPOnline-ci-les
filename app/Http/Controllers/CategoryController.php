<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('category/index', [
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
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
            'name' => 'required|max:255|unique:categories',
            'color' => 'required|max:255|unique:categories'
        ]);
        // Create new Category object with the info in the request
        $category = Category::create([
            'name' => $request ['name'],
            'color' => $request ['color'],
        ]);
        // Save this object in the database
        $category->save();
        // Redirect to the category.index page with a success message.
        return redirect('category')->with('success', $category->name . ' is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('category/show', [
            'category' => Category::findOrFail($id),
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
        return view('category/edit', [
            'category' => Category::findOrFail($id),
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
            'color' => 'required|max:255',
        ]);

        $category = Category::findorfail($id);
        $category->name = $request ['name'];
        $category->color = $request ['color'];
        // Save the changes in the database
        $category->save();

        // Redirect to the category.index page with a success message.
        return redirect('category')->with('success', $category->name . ' is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the category object in the database
        $category = Category::findorfail($id);
        // Remove the category from the database
        $category->delete();
        // Redirect to the category.index page with a success message.
        return redirect('category')->with('success', $category->name . ' is verwijderd.');
    }
}
