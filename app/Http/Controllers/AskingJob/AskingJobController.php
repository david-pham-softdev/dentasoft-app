<?php

namespace App\Http\Controllers\AskingJob;

use App\Http\Controllers\Controller;
use App\Http\Requests\AskingJob\StoreAskingJobRequest;
use App\Http\Requests\AskingJob\UpdateAskingJobRequest;
use App\Http\Requests\Material\UpdateMaterialRequest;
use App\Models\AskingJob;
use App\Models\Material;
use App\Models\Patient;
use App\Models\User;
use App\Models\UserElab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AskingJobController extends Controller
{
    public function index()
    {
//        $this->authorize('show-patient', User::class);
        $asking_jobs = AskingJob::where('user_id', Auth::id())
            ->with('patient', 'userElab', 'material', 'user')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('asking-jobs.index', compact('asking_jobs'));
    }

    public function create()
    {
        // $this->authorize('create-patient', User::class);
        $materials = Material::where('user_id', Auth::id())
            ->orWhereHas('user.roles', function ($query) {
                $query->where('name', 'Administrators');
            })->get();

        $labIds = UserElab::where('from_user_id', Auth::id())->pluck('to_user_id')->toArray();
        $laboratories = User::whereHas('roles', function ($query) {
            $query->where('name', 'Lab');
        })
            ->whereIn('id', $labIds)
            ->get();
        $patients = Patient::where('user_id', Auth::id())->get();

        return view('asking-jobs.create', compact('materials', 'laboratories', 'patients'));
    }


    public function store(StoreAskingJobRequest $request)
    {
        // $this->authorize('create-patient', User::class);
        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $key => $image) {
                $path = $image->store('uploads', 'public');
                $attachments[$key]['path'] = $path;
                $attachments[$key]['name'] = $image->getClientOriginalName();
            }
        }

        $dentalChartPath = '';
        if ($request->input('dental_chart')) {
            $base64Image = $request->input('dental_chart');
            $fileData = explode(';base64,', $base64Image);
            $fileType = explode('/', $fileData[0])[1];
            $fileContent = base64_decode($fileData[1]);
            $fileName = uniqid() . '.' . $fileType;
            $dentalChartPath = 'uploads/' . $fileName;

            Storage::disk('public')->put($dentalChartPath, $fileContent);
        }

        AskingJob::create([
            'user_id' => Auth::id(),
            'patient_id' => $request->input('patient_id'),
            'user_elab_id' => $request->input('user_elab_id'),
            'tooth_number' => $request->input('tooth_number'),
            'shade' => $request->input('shade'),
            'dental_chart' => $dentalChartPath,
            'material_id' => $request->input('material_id'),
            'notes' => $request->input('notes'),
            'work_delivery_date' => $request->input('work_delivery_date'),
            'work_delivery_time' => $request->input('work_delivery_time'),
            'delivery_remarks' => $request->input('delivery_remarks'),
            'attachment' => json_encode($attachments),
        ]);
        $this->flashMessage('check', 'Asking Job successfully added!', 'success');

        return redirect()->route('asking-job');
    }

    public function show($id)
    {
        // $this->authorize('show-user', User::class);

    	$asking_job = AskingJob::with('patient', 'userElab', 'material', 'user')
            ->where('id', $id)
            ->first();
        // dd($asking_job->attachment);
    	if(!$asking_job){
        	$this->flashMessage('warning', 'Asking Job not found!', 'danger');
            return redirect()->route('asking-job');
        }

        return view('asking-jobs.show', compact('asking_job'));
    }

    public function edit($id)
    {
    	// $this->authorize('edit-patient', User::class);

    	$asking_job = AskingJob::find($id);
        $materials = Material::where('user_id', Auth::id())
            ->orWhereHas('user.roles', function ($query) {
                $query->where('name', 'Administrators');
            })->get();

        $labIds = UserElab::where('from_user_id', Auth::id())->pluck('to_user_id')->toArray();
        $laboratories = User::whereHas('roles', function ($query) {
            $query->where('name', 'Lab');
        })
            ->whereIn('id', $labIds)
            ->get();
        $patients = Patient::where('user_id', Auth::id())->get();

    	if(!$asking_job){
        	$this->flashMessage('warning', 'Asking Job not found!', 'danger');
            return redirect()->route('asking-job');
        }

        return view('asking-jobs.edit', compact('asking_job', 'materials', 'laboratories', 'patients'));
    }

    public function update(UpdateAskingJobRequest $request,$id)
    {
    	// $this->authorize('edit-patient', User::class);
    	$asking_job = AskingJob::find($id);
        if(!$asking_job){
        	$this->flashMessage('warning', 'Asking Job not found!', 'danger');
            return redirect()->route('asking-job');
        }

        $attachments = [];
        if ($request->hasFile('attachments')) {
            $request->validate([
                'attachments.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048'
            ]);
            foreach ($request->file('attachments') as $key => $image) {
                $path = $image->store('uploads', 'public');
                $attachments[$key]['path'] = $path;
                $attachments[$key]['name'] = $image->getClientOriginalName();
            }
        }

        $asking_job->update(array_merge($request->all(), ['attachment' => json_encode($attachments)]));

        $this->flashMessage('check', 'Asking Job updated successfully!', 'success');

        return redirect()->route('asking-job');
    }

    public function destroy($id)
    {
        // $this->authorize('destroy-patient', User::class);

        $asking_job = AskingJob::find($id);
        if(!$asking_job){
        	$this->flashMessage('warning', 'Asking Job not found!', 'danger');
            return redirect()->route('asking-job');
        }

        $asking_job->delete();
        $this->flashMessage('check', 'Asking Job successfully deleted!', 'success');

        return redirect()->route('asking-job');
    }
}
