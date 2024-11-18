<?php 

namespace App\Http\Requests\Setting; 

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
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'company' => 'required|string|min:1|max:255',
            'code_elab' => 'required|string|min:1|max:255',
            'email' => 'required|email|unique:users,email,'.$this->id,
			'phone_number' => ['required', 'numeric', 'digits:10']
		]; 
	} 
}