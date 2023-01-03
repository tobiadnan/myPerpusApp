<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $rentLogs = RentLog::with(['user', 'book'])->take(5)->get();

        return view('dashboard', [
            'book_count' => $bookCount,
            'category_count' => $categoryCount,
            'user_count' => $userCount,
            'rentLogs' => $rentLogs
        ]);
    }
}
