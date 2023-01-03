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
        $users = User::where('id', '!=', 1)->where('status', '!=', 'in active')->get();
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
            Session::flash('message', [
                'text' => 'Book is not available now',
                'type' => 'danger'
            ]);
            return redirect('book-rent');
        } else {
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', [
                    'text' => 'Sorry. The user has exceeded the book rental limit. The user has 3 books that have not been returned!',
                    'type' => 'danger'
                ]);
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

                    Session::flash('message', [
                        'text' => 'Rent success',
                        'type' => 'success'
                    ]);
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function return()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'in active')->get();
        $books = Book::all();
        return view('book-return', [
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function storeReturn(Request $request)
    {
        #dd($request->all());
        $rent = RentLog::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);

        $rentData = $rent->first();
        $countData = $rent->count();
        //dd($rentData);

        if ($countData == 1) {
            # return book
            $rentData->actual_return_date
                = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash(
                'message',
                [
                    'text' => 'The book returned successfully!',
                    'type' => 'success'
                ]
            );
            return redirect('book-return');
        } else {
            # error msg
            Session::flash(
                'message',
                [
                    'text' => 'Oops. There is something wrong!',
                    'type' => 'danger'
                ]
            );
            return redirect('book-return');
        }
    }
}
