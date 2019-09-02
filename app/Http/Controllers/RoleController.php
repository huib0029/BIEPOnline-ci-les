<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        return view('role/index', [
            'roles' => Role::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role/create');
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
            'name' => 'required|max:255|unique:roles',
        ]);
        // Create new Role object with the info in the request
        $role = Role::create([
            'name' => $request ['name'],
        ]);
        // Save this object in the database
        $role->save();
        // Redirect to the user.index page with a success message.
        return redirect('role')->with('success', $role->name . ' is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('role/show', [
            'role' => Role::findOrFail($id),
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
        return view('role/edit', [
            'role' => Role::findOrFail($id),
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

        $role = Role::findorfail($id);
        $role->name = $request ['name'];
        // Save the changes in the database
        $role->save();

        // Redirect to the user.index page with a success message.
        return redirect('role')->with('success', $role->name . ' is bijgewerkt.');
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
        $role = Role::findorfail($id);
        // Remove the user from the database
        $role->delete();
        // Redirect to the user.index page with a success message.
        return redirect('role')->with('success', $role->name . ' is verwijderd.');
    }
}
