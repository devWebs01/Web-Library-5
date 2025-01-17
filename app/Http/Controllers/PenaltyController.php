<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenaltyRequest;
use App\Models\Penalty;
use App\Models\Transaction;

class PenaltyController extends Controller
{
    public function create($id)
    {
        $transaction = Transaction::find($id);

        return view('penalty.create', compact('transaction'));
    }

    public function store(PenaltyRequest $request)
    {
        $request->file('image')->getClientOriginalName();
        $storagePath = $request->file('image')->store('public/bukti');

        Penalty::create([
            'transaction_id' => $request->transaction_id,
            'image' => $storagePath,
            'status' => 'Lunas',
        ]);

        if (Auth()->user()->role == 'Anggota') {
            return back();
        } else {
            return redirect()->route('transactions.return');
        }
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);

        return view('history.show', compact('transaction'));
    }
}
