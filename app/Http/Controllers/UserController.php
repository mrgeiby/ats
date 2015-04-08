<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Engineer;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CreateUserRequest;
use Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = User::paginate(5);
        $data->setPath('users');
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->all();
        $user = User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'address' => $data['address'],
            'town' => $data['town'],
            'postCode' => $data['postCode'],
            'dob' => $data['dateOfBirth'],
            'phoneNumber' => $data['phoneNumber'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role'],
        ]);

        if ($data['role'] == 3) {
            $engineer = Engineer::create([
                'rate' => '0.0',
                'user_id' => $user->id,
            ]);
        } else if ($data['role'] == 4) {
        }
        return redirect('users/')->with('success', 'Account created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function edit()
    {
        $data = User::where('id', '=', Auth::user()->id)->first();
        return view('user.edit', compact('data'));
    }

    public function modify($id)
    {
        $data = User::where('id', '=', $id)->first();
        return view('user.modify', compact('data'));
    }

    public function saveModify(UserRequest $request)
    {
        $data = $request->all();
        $user = User::where('id', '=', $data['id'])->first();
        $user->firstName = $data['firstName'];
        $user->lastName = $data['lastName'];
        $user->dob = $data['dateOfBirth'];
        $user->address = $data['address'];
        $user->town = $data['town'];
        $user->postCode = $data['postCode'];
        $user->phoneNumber = $data['phoneNumber'];
        $user->save();
        return redirect('users/')->with('success', 'Account updated successfully!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = User::where('id', '=', $id)->first();
        $data->delete();
        return redirect('users/')->with('success', 'Account deleted successfully!');
    }

}
