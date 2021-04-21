<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\User;
use App\UserDetail;
use App\Vote;
use App\Review;


class GuestController extends Controller
{
    public function index()

    {
        $users= User::all();
        $userDetails= UserDetail::all();
        $departments = Department::all();

         return view('homepage', compact('users', 'userDetails', 'departments'));
    }



    public function advance()

    {
         return view('advanced');
    }



    public function show(User $user, $id){


        $user = User::where('id', $id)->first();
        $reviews = User::find(isset($id))->reviews()->orderBy('id', 'desc')->paginate(5);
        $votes = Vote::all();
        return view('showDoc', compact('user', 'votes', 'reviews'));

    }

}
