<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdatePasswordUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        $this->authorize('show-patient', User::class);

        if (Auth::user()->hasAnyRoles('Administrators')) {
            $patients = Patient::paginate(15);
            return view('patients.index', compact('patients'));
        }
        $patients = Patient::where('user_id', Auth::id())->paginate(15);

        return view('patients.index', compact('patients'));
    }

    public function show($id)
    {
    	$this->authorize('show-patient', User::class);

    	$user = User::find($id);

    	if(!$user){
        	$this->flashMessage('warning', 'Patient not found!', 'danger');
            return redirect()->route('user');
        }

        $roles = Role::all();

		$roles_ids = Role::rolesUser($user);

        return view('users.show',compact('user', 'roles', 'roles_ids'));
    }

    public function create()
    {
        $this->authorize('create-patient', User::class);

        $roles = Role::all();

        return view('patients.create',compact('roles'));
    }

    public function store(StorePatientRequest $request)
    {
        $this->authorize('create-patient', User::class);

        Patient::create(array_merge($request->all(), ['user_id' => Auth::id()]));
        $this->flashMessage('check', 'Patient successfully added!', 'success');

        return redirect()->route('patient');
    }

    public function edit($id)
    {
    	$this->authorize('edit-patient', User::class);

    	$patient = Patient::find($id);

    	if(!$patient){
        	$this->flashMessage('warning', 'Patient not found!', 'danger');
            return redirect()->route('patient');
        }

        return view('patients.edit', compact('patient'));
    }

    public function update(UpdatePatientRequest $request,$id)
    {
    	$this->authorize('edit-patient', User::class);

    	$patient = Patient::find($id);

        if(!$patient){
        	$this->flashMessage('warning', 'Patient not found!', 'danger');
            return redirect()->route('patient');
        }

        $patient->update($request->all());

        $this->flashMessage('check', 'Patient updated successfully!', 'success');

        return redirect()->route('patient');
    }

    public function destroy($id)
    {
        $this->authorize('destroy-patient', User::class);

        $patient = Patient::find($id);

        if(!$patient){
        	$this->flashMessage('warning', 'Patient not found!', 'danger');
            return redirect()->route('patient');
        }

        $patient->delete();
        $this->flashMessage('check', 'Patient successfully deleted!', 'success');

        return redirect()->route('patient');
    }
}
