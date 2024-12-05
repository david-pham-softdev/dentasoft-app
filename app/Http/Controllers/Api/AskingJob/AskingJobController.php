<?php

namespace App\Http\Controllers\Api\AskingJob;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\AskingJob\StoreAskingJobRequest;
use App\Http\Requests\AskingJob\UpdateAskingJobRequest;
use App\Http\Resources\AskingJobResource;
use App\Models\AskingJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AskingJobController extends Controller
{
    public function index()
    {
        $asking_jobs = AskingJob::where('user_id', Auth::id())
            ->with('patient', 'userElab', 'material', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return $this->responseSuccess([
            'asking_jobs' => AskingJobResource::collection($asking_jobs),
        ], 'Asking Jobs successfully retrieved!');
    }


    public function store(StoreAskingJobRequest $request)
    {
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

        return $this->responseSuccess([], 'Asking Job successfully added!');
    }

    public function show($id)
    {
    	$asking_job = AskingJob::with('patient', 'userElab', 'material', 'user')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    	if(!$asking_job){
            return $this->responseError([], 'Asking Job not found!', 404);
        }

        return $this->responseSuccess(new AskingJobResource($asking_job), 'Asking Job successfully retrieved!');
    }

    public function update(UpdateAskingJobRequest $request,$id)
    {
        $asking_job = AskingJob::where([
            'id' => $id,
            'user_id' => Auth::id()
        ])->first();
        if(!$asking_job){
            return $this->responseError([], 'Asking Job not found!', 404);
        }

        $askingJobInput = $request->all();
        $askingJobInput['attachment'] = [];
        if (!empty($request->input('remove_attachments'))) {
            foreach (json_decode($asking_job->attachment) as $attachment) {
                if (in_array($attachment->name, $request->input('remove_attachments'))) {
                    array_push($askingJobInput['attachment'], [
                        'path' => $attachment->path,
                        'name' => $attachment->name,
                    ]);
//                    Storage::disk('public')->delete($attachment->path);
//                    unset($askingJobInput['attachment'][$key]);
                }
            }
        }

        if ($request->hasFile('attachments')) {
            $request->validate([
                'attachments.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048'
            ]);
            foreach ($request->file('attachments') as $key => $image) {
                $path = $image->store('uploads', 'public');
                array_push($askingJobInput['attachment'], [
                    'path' => $path,
                    'name' => $image->getClientOriginalName(),
                ]);
            }
        }

        if ($request->input('dental_chart')) {
            $validator = Validator::make($request->all(), [
                'dental_chart' => 'regex:/^data:image\/[a-zA-Z]+;base64,[A-Za-z0-9+\/=]+$/'
            ]);
            if ($validator->fails()) {
                return response()->json('The dental chart must be a valid Base64 encoded string.', 422);
            }

            $base64Image = $request->input('dental_chart');
            $fileData = explode(';base64,', $base64Image);
            $fileType = explode('/', $fileData[0])[1];
            $fileContent = base64_decode($fileData[1]);
            $fileName = uniqid() . '.' . $fileType;
            $dentalChartPath = 'uploads/' . $fileName;
            $askingJobInput['dental_chart'] = $dentalChartPath;

            Storage::disk('public')->put($dentalChartPath, $fileContent);
        }

        $asking_job->update($askingJobInput);

        return $this->responseSuccess($asking_job, 'Asking Job successfully updated!');
    }

    public function destroy($id)
    {
        $asking_job = AskingJob::where([
            'id' => $id,
            'user_id' => Auth::id()
        ])->first();
        if(!$asking_job){
            return $this->responseError([], 'Asking Job not found!', 404);
        }

        $asking_job->delete();

        return $this->responseSuccess([], 'Asking Job successfully deleted!');
    }
}
