<?php

namespace App\Http\Controllers\Api\ELab;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\ElabCode\StoreElabCodeRequest;
use App\Models\UserElab;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ElabCodeController extends Controller
{
    public function index()
    {
        // $this->authorize('show-elab', User::class);
        $labIds = UserElab::where('from_user_id', Auth::id())->pluck('to_user_id')->toArray();
        $laboratories = User::whereHas('roles', function ($query) {
            $query->where('name', 'Lab');
        })
            ->whereIn('id', $labIds)
            ->paginate(15);

        return $this->responseSuccess($laboratories);
    }

    public function show($id)
    {
//    	$this->authorize('show-elab', UserElab::class);
        $user_lab = UserElab::where('from_user_id', Auth::id())->where('to_user_id', $id)->first();
    	if(!$user_lab){
            return $this->responseError([], 'Laboratory not found!', 404);
        }

        $laboratory = User::find($id);

        return $this->responseSuccess($laboratory);
    }

    public function store(StoreElabCodeRequest $request)
    {
//        $this->authorize('create-elab', UserElab::class);
        $laboratory = User::where('code_elab', $request->code_elab)->first();
        if (!$laboratory) {
            return $this->responseError([], 'Laboratory not found!', 404);
        }
        if ($laboratory->hasAnyRoles('Dentist') || $laboratory->id == Auth::id()) {
            return $this->responseError([], 'Laboratory invalid!', 400);
        }

        $isExist = UserElab::where('from_user_id', Auth::id())->where('to_user_id', $laboratory->id)->first();
        if ($isExist) {
            return $this->responseError([], 'Elab code already added!', 400);
        }

        DB::table('user_elab')->insert(['from_user_id' => Auth::id(), 'to_user_id' => $laboratory->id]);

        return $this->responseSuccess([], 'Elab code successfully added!', 200);
    }



    public function destroy($id)
    {
//        $this->authorize('destroy-elab', UserElab::class);

        $elabCode = UserElab::where('from_user_id', Auth::id())->where('to_user_id', $id)->first();

        if(!$elabCode){
            return $this->responseError([], 'Laboratory not found!', 404);
        }

        $elabCode->delete();

        return $this->responseSuccess([], 'Elab code successfully deleted!', 200);
    }
}
