<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        # $today = Carbon::now()->toDateString();
        $rentLogs = RentLog::with(['user', 'book'])->get();

        return view('rentLogs', [
            'rentLogs' => $rentLogs
        ]);
    }
}
