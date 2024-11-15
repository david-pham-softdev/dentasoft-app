<?php

namespace App\Http\Controllers\ElabCode;

use App\Http\Controllers\Controller;
use App\Http\Requests\ElabCode\StoreElabCodeRequest;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\UserElab;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdatePasswordUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ElabCodeController extends Controller
{
    public function index()
    {
        $this->authorize('show-elab', User::class);
        $labIds = UserElab::where('from_user_id', Auth::id())->pluck('to_user_id')->toArray();
        $laboratories = User::whereHas('roles', function ($query) {
            $query->where('name', 'Lab');
        })
            ->whereIn('id', $labIds)
            ->paginate(15);

        return view('elab-codes.index', compact('laboratories'));
    }

    public function show($id)
    {
    	$this->authorize('show-elab', UserElab::class);
        $user_lab = UserElab::where('from_user_id', Auth::id())->where('to_user_id', $id)->first();

    	if(!$user_lab){
        	$this->flashMessage('warning', 'Laboratory not found!', 'danger');
            return redirect()->route('laboratory');
        }

        $laboratory = User::find($id);

        return view('elab-codes.show',compact('laboratory'));
    }

    public function store(StoreElabCodeRequest $request)
    {
        $this->authorize('create-elab', UserElab::class);
        $laboratory = User::where('code_elab', $request->code_elab)->first();
        if (!$laboratory) {
            $this->flashMessage('warning', 'Laboratory not found!', 'danger');
            return redirect()->back();
        }
        if ($laboratory->hasAnyRoles('Dentist') || $laboratory->id == Auth::id()) {
            $this->flashMessage('warning', 'Laboratory invalid!', 'danger');
            return redirect()->back();
        }

        $isExist = UserElab::where('from_user_id', Auth::id())->where('to_user_id', $laboratory->id)->first();
        if ($isExist) {
            $this->flashMessage('warning', 'Elab code already added!', 'danger');
            return redirect()->back();
        }

        DB::table('user_elab')->insert(['from_user_id' => Auth::id(), 'to_user_id' => $laboratory->id]);
        $this->flashMessage('check', 'Add Elab code successfully added!', 'success');

        return redirect()->route('laboratory');
    }



    public function destroy($id)
    {
        $this->authorize('destroy-elab', UserElab::class);

        $elabCode = UserElab::where('from_user_id', Auth::id())->where('to_user_id', $id)->first();

        if(!$elabCode){
        	$this->flashMessage('warning', 'Laboratory not found!', 'danger');
            return redirect()->route('laboratory');
        }

        $elabCode->delete();
        $this->flashMessage('check', 'Laboratory successfully deleted!', 'success');

        return redirect()->route('laboratory');
    }
}
