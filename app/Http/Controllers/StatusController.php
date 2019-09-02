<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller


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
        return view('status/index', [
            'statuses' => Status::orderBy('status', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status/create');
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
            'status' => 'required|max:255|unique:statuses',
        ]);
        // Create new Status object with the info in the request
        $status = Status::create([
            'status' => $request ['status'],
        ]);
        // Save this object in the database
        $status->save();
        // Redirect to the status.index page with a success message.
        return redirect('status')->with('success', $status->status . ' is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('status/show', [
            'status' => Status::findOrFail($id),
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
        return view('status/edit', [
            'status' => Status::findOrFail($id)
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
            'status' => 'required|max:255',
        ]);

        $status = Status::findorfail($id);
        $status->status = $request ['status'];
        // Save the changes in the database
        $status->save();

        // Redirect to the status.index page with a success message.
        return redirect('status')->with('success', $status->status . ' is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the status object in the database
        $status = Status::findorfail($id);
        //Remove the status from the database
        $status->delete();
        //Redirect to the status. index page with a succes message.
        return redirect('status')->with('success', $status->status . ' is verwijderd.');
    }
}
