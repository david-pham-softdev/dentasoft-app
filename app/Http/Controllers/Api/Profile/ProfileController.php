<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Profile\Api\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

	public function index()
	{
        return $this->responseSuccess(new UserResource(Auth::user()));
	}

	public function updateProfile(UpdateProfileRequest $request)
    {
    	$user = Auth::user();
        $user->update($request->all());

        return $this->responseSuccess(new UserResource($user));
    }
}
