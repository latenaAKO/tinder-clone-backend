<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function __construct()
    {

    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if(! $user->location) {
            $user->location()->create($request->only(['latitude', 'longitude']));
        }
        else {
            $user->location()->detach();
            $user->location()->create($request->only(['latitude', 'longitude']));
        }

        return $this->respondSuccess();
    }
}
