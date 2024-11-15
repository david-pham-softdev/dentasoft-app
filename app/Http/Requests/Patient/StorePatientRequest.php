<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
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
			'first_name' => 'required|string|min:1|max:255',
			'last_name' => 'required|string|min:1|max:255',
            'email' => 'string|email|max:255',
            'age' => 'required|',
            'gender' => ['required', 'in:female,male']
		]; 
	} 
}
