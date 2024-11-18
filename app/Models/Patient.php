<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;

class Patient extends Model
{
	protected $fillable = [
        'first_name', 'last_name', 'email', 'age', 'gender', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
