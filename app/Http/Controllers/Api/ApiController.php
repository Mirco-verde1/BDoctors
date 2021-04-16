<?php

namespace App\Http\Controllers\Api;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __invoke()

    {

        $doctors = User::all();


        return response()->json($doctors);

    }
}
