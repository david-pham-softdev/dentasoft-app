<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\User\StoreUserApiRequest;
use App\Http\Requests\User\UpdateUserApiRequest;
use App\Http\Resources\UserResource;
use App\Mail\ProvidePassword;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())
            ->where('created_by', Auth::id())
            ->orderBy('created_at', 'desc')->paginate(15);
        return $this->responseSuccess(['users' => UserResource::collection($users)]);
    }

    public function show($id)
    {
        $user = User::where('id', $id)->where('created_by', Auth::id())->first();
        if(!$user){
            return $this->responseError([], 'User not found!', 404);
        }
        return $this->responseSuccess(new UserResource($user));
    }

    public function store(StoreUserApiRequest $request)
    {
        $user = User::create([
            'active' => 1,
            'avatar' => 'img/config/nopic.png',
            'name' => $request['first_name']. ' ' .$request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make('Secret@123'),
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'code_elab' => $request['code_elab'],
            'company' => $request['company'],
            'created_by' => Auth::id(),
        ]);
//        $this->sendEmailProvidePasswod($user->email, $user->name, 'Secret@123');

        $role = Role::where('name', $request['role'])->first();
        $user->roles()->sync($role->id); // role id for those who register in the system

        return $this->responseSuccess(['user' => $user], 'User successfully added!');
    }

    public function update(UpdateUserApiRequest $request,$id)
    {
        $user = User::where('id', $id)->where('created_by', Auth::id())->first();
        if(!$user) {
            return $this->responseError([], 'User not found!', 404);
        }
        if ($request->email != $user->email) {
            $user->update(['email' => $request->email, 'password' => Hash::make('Secret@123')]);
//            $this->sendEmailProvidePasswod($request->email, $user->name, 'Secret@123');
        } else {
            $user->update($request->only('first_name', 'last_name', 'phone_number', 'code_elab', 'company', 'role'));
        }
        return $this->responseSuccess(['user' => new UserResource($user)], 'User updated successfully!');
    }

    public function destroy($id)
    {

        $user = User::where('id', $id)->first();
        if(!$user) {
            return $this->responseError([], 'User not found!', 404);
        }

        $user->delete();
        return $this->responseSuccess([], 'User deleted successfully!');
    }

    private function sendEmailProvidePasswod($email, $userName, $password)
    {
        try {
            Mail::to($email)->send(new ProvidePassword($password, $userName));
        } catch (\Exception $e) {
            Log::error("Error sending email: " . $e->getMessage());
        }
    }
}
