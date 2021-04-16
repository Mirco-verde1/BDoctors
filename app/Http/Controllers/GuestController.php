<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()

    {
         return view('homepage');
    }



    public function advance()

    {
         return view('advanced');
    }


}
