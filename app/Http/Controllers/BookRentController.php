<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::all();
        $books = Book::all();

        return view('book-rent', [
            'users' => $users,
            'books' => $books
        ]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('msg', 'Book is not available now');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('msg', 'Sorry. The user has exceeded the book rental limit. The user has 3 books that have not been returned');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    # insert to rent_logs table
                    RentLog::create($request->all());
                    # update books table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();

                    Session::flash('msg', 'Rent success');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }
}
