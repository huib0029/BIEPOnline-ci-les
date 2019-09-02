<?php

namespace App\Http\Controllers;

use App\Location;
use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
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
        return view('user/index', [
            'users' => User::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/create', [
            'roles' => Role::orderBy('name', 'asc')->pluck('name', 'id'),
            'locations' => Location::orderBy('name', 'asc')->pluck('name', 'id'),
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'min:6|confirmed',
            'role_id' => 'required|max:255',
        ]);
        // Create new User object with the info in the request
        $user = User::create([
            'name' => $request ['name'],
            'email' => $request ['email'],
        ]);
        // Associate the role to the user
        $role = Role::find($request ['role_id']);
        $location = Location::find($request ['location_id']);
        $user->role()->associate($role);
        $user->location()->associate($location);
        // Save this object in the database
        $user->save();
        // Redirect to the user.index page with a success message.
        return redirect('user')->with('success', $user->name . ' is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user/show', [
            'user' => User::findOrFail($id),
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
        return view('user/edit', [
            'user' => User::findOrFail($id),
            'roles' => Role::orderBy('name', 'asc')->pluck('name', 'id'),
            'locations' => Location::orderBy('name', 'asc')->pluck('name', 'id'),
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
        // validate
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
            'role_id' => 'required|max:255',
        ]);
        // password
        $credentials = $request->only(
            'email', 'password', 'password_confirmation'
        );
        // find
        $user = \Auth::user();
        // name
        $user->name = $request ['name'];
        // email
        $user->email = $request ['email'];
        // foreign role
        $role = Role::find($request ['role_id']);
        $user->role()->associate($role);
        // foreign location
        $location = Location::find($request ['location_id']);
        $user->location()->associate($location);
        //check if filled in password is correct.
        if (!$_POST['password']) {
            echo "Er is geen nieuw wachtwoord ingesteld.";
        } else {
            if (preg_match("/^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/", $_POST['password'])) {
                //Change password of user if correct.
                $user->password = bcrypt($credentials['password']);
                echo "Het wachtwoord voldoet aan de gestelde eisen.";
                // save
                $user->save();
                // redirect
                return redirect('user/' . $user->id)->with('success', $user->name . ' is bijgewerkt.');
            } else {
                //Don't change password of user because incorrect.
                echo "Het wachtwoord moet een hoofdletter, nummer en een speciaal karakter bevatten.";
                // redirect
                return redirect('user/' . $user->id . '/edit')
                    ->with('failure', 'Het ingevoerde wachtwoord moet uit 6 tekens bestaan, een hoofdletter, nummer en een speciaal karakter bevatten.');
            }
        }
        //Save other information if password is empty.
        $user->save();
        // redirect
        return redirect('user/' . $user->id)->with('success', $user->name . ' is bijgewerkt.');
    }

    /**
     * Update your avatar.
     */
    public function update_avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|max:20000|mimes:jpg,jpeg,png',
        ]);
        $user = \Auth::user();
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $user->id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        $user = \Auth::user();
        return redirect('user/' . $user->id)->with('success', 'Je profielafbeelding is bijgewerkt.');
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
        $user = User::findorfail($id);
        // Remove the user from the database
        $user->delete();
        // Redirect to the user.index page with a success message.
        return redirect('user')->with('success', $user->name . ' is verwijderd.');
    }
}
