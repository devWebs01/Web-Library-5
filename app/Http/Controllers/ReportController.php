<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;

class ReportController extends Controller
{
    public function borrow()
    {
        return view('report.borrow', [
            'transactions' => Transaction::where('status_id', 2)->latest()->get(),
        ]);
    }

    public function return()
    {
        return view('report.return', [
            'transactions' => Transaction::whereNotIn('status_id', [1, 2, 8])->latest()->get(),
        ]);
    }

    public function books()
    {
        return view('report.books', [
            'books' => Book::latest()->get(),
        ]);
    }

    public function members()
    {
        return view('report.members', [
            'members' => User::where('role', 'Anggota')->whereNotNull('email_verified_at')->latest()->get(),
        ]);
    }

    public function penalties()
    {
        return view('report.penalty', [
            'penalties' => Transaction::whereIn('status_id', [3, 5, 6, 7])->latest()->get(),
        ]);
    }
}
