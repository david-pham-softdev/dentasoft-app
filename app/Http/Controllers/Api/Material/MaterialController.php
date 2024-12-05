<?php

namespace App\Http\Controllers\Api\Material;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Material\StoreMaterialRequest;
use App\Http\Requests\Material\UpdateMaterialRequest;
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
        return $this->responseSuccess(['materials' => $materials]);
    }

    public function getByUser()
    {
        $materials = Material::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(15);
        return $this->responseSuccess(['materials' => $materials]);
    }

    public function store(StoreMaterialRequest $request)
    {
        $materialExists = Material::where('name', $request->name)->first();
        if ($materialExists) {
            return $this->responseError([], 'Material already exists!');
        }
        Material::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        return $this->responseSuccess([], 'Material successfully added!');
    }

    public function update(UpdateMaterialRequest $request,$id)
    {
        $material = Material::where('id', $id)->where('user_id', Auth::id())->first();
        if(!$material){
            return $this->responseError([], 'Material not found!', 404);
        }

        $materialExists = Material::where('name', $request->name)->first();
        if ($materialExists && $materialExists->id != $material->id) {
            return $this->responseError([], 'Material already exists!');
        }

        $material->update($request->all());
        return $this->responseSuccess($material, 'Material updated successfully!');
    }

    public function destroy($id)
    {
        $material = Material::where('id', $id)->where('user_id', Auth::id())->first();

        if(!$material){
            return $this->responseError([], 'Material not found!', 404);
        }

        $material->delete();
        return $this->responseSuccess([], 'Material deleted successfully!');
    }
}
