<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Review;
use App\Vote;
use Redirect, Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Mail\Events\MessageSending;

class ChartController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $record = Review::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name', 'day')
        ->orderBy('day')
        ->get();

        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);
        return view('chart-js', $data);
    }
}
