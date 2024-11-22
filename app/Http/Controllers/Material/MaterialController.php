<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\Requests\Material\UpdateMaterialRequest;
use App\Http\Requests\Material\StoreMaterialRequest;
use App\Models\Material;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index()
    {
//        $this->authorize('show-patient', User::class);
        if (Auth::user()->hasAnyRoles('Administrators')) {
            $materials = Material::paginate(15);
            return view('materials.index', compact('materials'));
        }
        $materials = Material::where('user_id', Auth::id())->paginate(15);

        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        // $this->authorize('create-patient', User::class);
        return view('materials.create');
    }

    public function store(StoreMaterialRequest $request)
    {
        // $this->authorize('create-patient', User::class);

        Material::create(array_merge($request->all(), ['user_id' => Auth::id()]));
        $this->flashMessage('check', 'Material successfully added!', 'success');

        return redirect()->route('material');
    }

    public function edit($id)
    {
    	// $this->authorize('edit-patient', User::class);

    	$material = Material::find($id);

    	if(!$material){
        	$this->flashMessage('warning', 'Material not found!', 'danger');
            return redirect()->route('material');
        }

        return view('materials.edit', compact('material'));
    }

    public function update(UpdateMaterialRequest $request,$id)
    {
    	// $this->authorize('edit-patient', User::class);

    	$material = Material::find($id);

        if(!$material){
        	$this->flashMessage('warning', 'Material not found!', 'danger');
            return redirect()->route('material');
        }

        $material->update($request->all());

        $this->flashMessage('check', 'Material updated successfully!', 'success');

        return redirect()->route('material');
    }

    public function destroy($id)
    {
        // $this->authorize('destroy-patient', User::class);

        $material = Material::find($id);

        if(!$material){
        	$this->flashMessage('warning', 'Material not found!', 'danger');
            return redirect()->route('material');
        }

        $material->delete();
        $this->flashMessage('check', 'Material successfully deleted!', 'success');

        return redirect()->route('material');
    }
}
