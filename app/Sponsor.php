<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model

{

    protected $fillable = [ 'type', 'duration', 'price', 'user_id'];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
