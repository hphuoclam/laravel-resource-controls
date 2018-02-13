<?php

namespace Api\Users\Models;

use Api\Users\Models\User;
use Infrastructure\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
