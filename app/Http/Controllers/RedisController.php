<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class RedisController extends Controller
{
    public function cache(Request $request)
    {
        $data = Cache::remember('users', now()->addMinutes(5), function () {
            return User::get();
        });

        return view('index',compact('data'));

    }
}
