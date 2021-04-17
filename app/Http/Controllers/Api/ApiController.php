<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\User;
use App\UserDetail;
use App\Vote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'success' => true,
<<<<<<< HEAD
            'data' => User::with('departments', 'detail','votes')->get(),
=======
            'data' => User::with('departments', 'detail')->get()
>>>>>>> 26f8bfaead2642f197c72de69a9e056eaa9112b8
        ], 200);
    }




}
