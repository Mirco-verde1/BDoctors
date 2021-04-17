<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\User;
use App\UserDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'success' => true,
            'data' => User::with('departments', 'detail')->get()
        ], 200);
    }




}
