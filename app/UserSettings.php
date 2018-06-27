<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    protected $table = 'user_settings';

    protected $fillable = ['match_gender', 'match_age_min', 'match_age_max', 'match_location_min', 'match_location_max'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
