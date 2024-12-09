<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class StoreUserApiRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
			'email.unique'=>'E-mail already registered in the system.',
            'role.in' => 'Role must be Dentist or Lab.',
		];
	}

	public function rules()
	{
		return [
            'company' => 'required|string|max:255|min:3',
			'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'code_elab' => 'required|string|unique:users',
            'role' => ['required', 'in:Dentist,Lab']
		];
	}
}
