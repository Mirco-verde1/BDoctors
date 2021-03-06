<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function user(){

        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'pic', 'phone', 'curriculum', 'user_id',
    ];
}

