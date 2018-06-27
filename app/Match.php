<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable =  ['user_id', 'matched_user_id', 'is_super_like'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
