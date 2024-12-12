<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UpdateUserApiRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
			'email.unique'=>'E-mail already registered in the system.',
		];
	}

	public function rules()
	{
		return [
            'email' => 'required|email|unique:users,email,'.$this->id,
            'company' => 'required|string|max:255|min:3',
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'code_elab' => 'required|string|unique:users,code_elab,'.$this->id,
            'role' => ['required', 'in:Dentist,Lab']
		];
	}
}
