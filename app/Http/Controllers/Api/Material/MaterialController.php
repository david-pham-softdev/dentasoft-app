<?php

namespace App\Http\Controllers\Api\Material;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\Material;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::orderBy('created_at', 'desc')->paginate(15);
        if (empty($materials)) {
            return $this->responseError([], 'No material found!');
        }
        return $this->responseSuccess(['materials' => $materials]);
    }

    public function show($id)
    {
        $patient = Patient::where('id', $id)->where('user_id', Auth::id())->first();
        if(!$patient){
            return $this->responseError([], 'Patient not found!', 404);
        }

        return $this->responseSuccess($patient);
    }

    public function store(StorePatientRequest $request)
    {
        $exists = Patient::where('email', $request->email)->where('user_id', Auth::id())->first();
        if ($exists) {
            return $this->responseError([], 'Patient already exists!');
        }
        Patient::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        return $this->responseSuccess([], 'Patient successfully added!');
    }

    public function update(UpdatePatientRequest $request,$id)
    {
    	$patient = Patient::where('id', $id)->where('user_id', Auth::id())->first();

        if(!$patient){
        	return $this->responseError([], 'Patient not found!', 404);
        }

        $patientExists = Patient::where('email', $request->email)->where('user_id', Auth::id())->first();

        if ($patientExists && $patientExists->id != $patient->id) {
            return $this->responseError([], 'Patient already exists!');
        }

        $patient->update($request->all());

        return $this->responseSuccess($patient, 'Patient updated successfully!');
    }

    public function destroy($id)
    {
        $patient = Patient::where('id', $id)->where('user_id', Auth::id())->first();

        if(!$patient){
            return $this->responseError([], 'Patient not found!', 404);
        }

        $patient->delete();
        return $this->responseSuccess([], 'Patient deleted successfully!');
    }
}
