<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AskingJobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $attachments = json_decode($this->attachment);
        foreach ($attachments as $key => $attachment) {
            $attachments[$key]->path = config('app.url').'/storage/app/public/'.$attachment->path;
        }
        return [
            'id' => $this->id,
            'patient' => $this->patient,
            'user_elab' => $this->userElab,
            'material' => $this->material,
            'patient_id' => $this->patient_id,
            'user_elab_id' => $this->user_elab_id,
            'material_id' => $this->material_id,
            'user' => $this->user,
            'tooth_number' => $this->tooth_number,
            'shade' => $this->shade,
            'dental_chart' => config('app.url').'/storage/app/public/'.$this->dental_chart,
            'notes' => $this->notes,
            'work_delivery_date' => $this->work_delivery_date,
            'work_delivery_time' => $this->work_delivery_time,
            'delivery_remarks' => $this->delivery_remarks,
            'attachments' => $attachments
        ];
    }
}
