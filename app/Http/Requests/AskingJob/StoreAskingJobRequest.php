<?php

namespace App\Http\Requests\AskingJob;

use Illuminate\Foundation\Http\FormRequest;

class StoreAskingJobRequest extends FormRequest
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
            'patient_id' => 'required|numeric:exists:patients,id',
            'user_elab_id' => 'required|numeric:exists:users,id',
            'tooth_number' => 'required|numeric|min:1|max:32',
            'shade' => 'required|string|min:1|max:255',
            'material_id' => 'required|numeric:exists:materials,id',
            'notes' => 'required|string|min:10',
            'work_delivery_date' => 'required|date',
            'work_delivery_time' => 'required|date_format:H:i',
            'delivery_remarks' => 'required|string|min:10',
            'attachments.*' => 'file|max:1048|mimes:jpeg,png,jpg,gif,svg',
            'dental_chart' => 'required'
        ];
    }
}
