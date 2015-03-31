<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
            'firstName' => 'required|max:100',
            'lastName' => 'required|max:100',
            'address' => 'required|max:255',
            'town' => 'required|max:100',
            'postCode' => 'required|min:3|max:9',
            'dateOfBirth' => 'required|date',
            'phoneNumber' => 'required|min:11|max:13',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
            'role' => 'required',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
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
	}

}
