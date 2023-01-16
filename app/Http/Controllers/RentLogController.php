<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class RentLogController extends Controller
{
    public function index()
    {
        # $today = Carbon::now()->toDateString();
        $rentLogs = RentLog::with(['user', 'book'])->get();

        //dd($rentLogs);
        return view('rentLogs', [
            'rentLogs' => $rentLogs
        ]);
    }
}
