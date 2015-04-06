<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'firstName' => 'required|max:100',
            'lastName' => 'required|max:100',
            'address' => 'required|max:255',
            'town' => 'required|max:100',
            'postCode' => 'required|min:3|max:9',
            'dateOfBirth' => 'required|date',
            'phoneNumber' => 'required|min:11|max:13',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
		];
	}

}
