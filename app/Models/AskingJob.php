<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;

class AskingJob extends Model
{
    protected $table = 'asking_jobs';
	protected $fillable = ['id', 'user_id', 'patient_id', 'user_elab_id', 'tooth_number', 'shade', 'dental_chart', 'material_id', 'notes', 'work_delivery_date', 'work_delivery_time', 'delivery_remarks', 'attachment'];

    public function userElab()
    {
    	return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'work_delivery_date' => 'date',
        'work_delivery_time' => 'datetime',
    ];

    public function getFormattedDeliveryDateAttribute()
    {
        return $this->work_delivery_date ? $this->work_delivery_date->format('d/m/Y') : null;
    }

    public function getFormattedDeliveryTimeAttribute()
    {
        return $this->work_delivery_time ? $this->work_delivery_time->format('H:i') : null;
    }
}
