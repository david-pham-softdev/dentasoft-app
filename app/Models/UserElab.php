<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class UserElab extends Model
{
    protected $table = 'user_elab';
	protected $fillable = [
        'from_user_id', 'to_user_id',
    ];

	public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
