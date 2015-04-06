<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $data = User::where('id', '=', Auth::user()->id)->first();
        return view('user.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
        $data = User::where('id', '=', Auth::user()->id)->first();
        return view('user.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserRequest $request)
	{
        $data = $request->all();
        $user = User::where('id', '=', Auth::user()->id)->first();
        $user->firstName = $data['firstName'];
        $user->lastName = $data['lastName'];
        $user->dob = $data['dateOfBirth'];
        $user->address = $data['address'];
        $user->town = $data['town'];
        $user->postCode = $data['postCode'];
        $user->phoneNumber = $data['phoneNumber'];
        $user->save();
        return redirect('user/edit')->with('success', 'Account updated successfully!');

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
