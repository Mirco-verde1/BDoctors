<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Message;
use App\User;
use App\UserDetail;
use App\Vote;
use App\Review;
use Illuminate\Support\Facades\Auth;
use MessagesSeeder;

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

    public function showDash(User $user, $id){

        $users = User::all();
        $user = Auth::user();
        $reviews = User::find(isset($id))->reviews()->orderBy('id', 'desc')->paginate(1);
        $votes = Vote::all();
        $messages = User::find(isset($id))->messages()->orderBy('id', 'desc')->paginate(1);
        return view('doctor_view.dashboard', compact('user','users','votes', 'reviews','messages'));

    }

}
