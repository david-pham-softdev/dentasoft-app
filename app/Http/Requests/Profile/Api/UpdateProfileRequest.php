<?php 

namespace App\Http\Requests\Profile\Api; 

use App\Http\Requests\Request; 

class UpdateProfileRequest extends Request 
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
            'email' => 'email|unique:users,email,'.$this->id,
            'company' => 'required|string|max:255|min:3',
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'code_elab' => 'string|unique:users,code_elab,'.$this->id,
            'role' => ['required', 'in:Dentist,Lab']
		];
	}
}