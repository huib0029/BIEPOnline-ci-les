<?php

namespace App\Http\Controllers;

use App\Copy;
use App\Loan;
use App\User;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
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
        return view('loan/index', [
            'loans' => Loan::orderBy('expirydate', 'asc')->whereNull('returndate')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan/create', [
            'copies' => Copy::join('books', 'books.id', '=', 'copies.book_id')->orderBy('books.title', 'asc')->pluck('status_id', 'books.title', 'copies.id'),
            'users' => User::orderBy('name', 'asc')->pluck('name', 'id'),
            'status' => Status::orderBy('status', 'asc')->pluck('status', 'id'),
        ]);
        // create a new Loan
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
            'startdate' => 'required|date|max:255',
            'expirydate' => 'required|date|max:255',
            'returndate' => 'date|After:startdate|max:255',
            'copy_id' => 'required|max:255',
            'user_id' => 'required|max:255',
            'status_id' => 'required|max:255',
        ]);

        // Create new loans object with the info in the request
        $loan = Loan::create([
            'startdate' => $request ['startdate'],
            'expirydate' => $request ['expirydate'],
            'returndate' => $request ['returndate'],
            'copy_id' => $request ['copy_id'],
            'user_id' => $request ['user_id'],
            'status_id' => $request ['status_id'],
        ]);

        // Find requests of copy_id, user_id and status_id
        $copy = Copy::find($request ['copy_id']);
        $user = User::find($request ['user_id']);
        $status = Status::find($request ['status_id']);

        // Associate the copy, user and status to loan
        $loan->copy()->associate($copy);
        $loan->user()->associate($user);
        $loan->status()->associate($status);

        // Save this object in the database
        $loan->save();

        // Redirect to the loans.index page with a success message.
        return redirect('loan')->with('success', 'Uitlening toegevoegd!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id = the ordernumber
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('loan/show', [
            'loan' => Loan::findOrFail($id),
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
        return view('loan/edit', [
            'loan' => Loan::findOrFail($id),
            'copies' => Copy::join('books', 'books.id', '=', 'copies.book_id')->orderBy('books.title', 'asc')->pluck('status_id', 'books.title', 'copies.id'),
            'users' => User::orderBy('name', 'asc')->pluck('name', 'id'),
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
            'startdate' => 'required|date|max:255',
            'expirydate' => 'required|date|After:startdate|max:255',
            'returndate' => 'date|After:startdate|max:255',
            'copy_id' => 'required|max:255',
            'user_id' => 'required|max:255',
            'status_id' => 'required|max:255',
        ]);

        $loan = Loan::findorfail($id);
        $loan->startdate = $request ['startdate'];
        $loan->expirydate = $request ['expirydate'];
        $loan->returndate = $request ['returndate'];

        // Find requests of copy_id, user_id and status_id
        $copy = Copy::find($request ['copy_id']);
        $user = User::find($request ['user_id']);
        $status = Status::find($request ['status_id']);

        // Associate the copy, user and status to loan
        $loan->copy()->associate($copy);
        $loan->user()->associate($user);
        $loan->status()->associate($status);

        // Save the changes in the database
        $loan->save();

        // Redirect to the loans.index page with a success message.
        return redirect('loan')->with('success', $loan->copy->book->title . ' is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the loans object in the database
        $loan = Loan::findorfail($id);

        // Remove the loans from the database
        $loan->delete();

        // Redirect to the loans.index page with a success message.
        return redirect('loan')->with('success', $loan->copy->book->title . ' is verwijderd.');
    }

    public function handin(Request $request, $id)
    {
        // Check if the form was correctly filled in
        $this->validate($request, [
            'returndate' => 'date|After:startdate|max:255',
        ]);

        $loan = Loan::findorfail($id);

        //filling in returndate
        $loan->returndate = Carbon::today();

        // Save the changes in the database
        $loan->save();

        // Redirect to the loan.index page with a success message.
        return redirect('loan')->with('success', $loan->copy->book->title . ' is ingeleverd.');
    }
}
