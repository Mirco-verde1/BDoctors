<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $user = Auth::user();
        return view('doctor_view.dashboard', compact('user'));
    }

    public function myReviews()
    {
        $reviews = Auth::user()->reviews;

        return view('doctor_view.reviews', compact('reviews'));
    }

    public function myMessages()
    {
        $messages = Auth::user()->messages;

        return view('doctor_view.messages', compact('messages'));
    }

}
