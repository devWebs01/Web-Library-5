<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function action($id, Request $request)
    {

        $transaction = Transaction::find($id);

        if ($request->status_id == 2) {
            // Konfirmasi...
            $transaction->update([
                'status_id' => $request->status_id,
                'penalty_total' => $request->penalty ?? 0,
                'borrow_date' => Carbon::now()->format('Y-m-d'),
                'return_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            ]);

            return back();
        } elseif ($request->status_id == 3) {
            // Terlambat...
            $transaction->update([
                'status_id' => $request->status_id,
                'penalty_total' => $request->penalty ?? 0,

            ]);

            return redirect()->route('penalties.create', $transaction->id);
        } elseif ($request->status_id == 4) {
            // Dikembalikan...
            $transaction->update([
                'status_id' => $request->status_id,
                'penalty_total' => $request->penalty ?? 0,

            ]);

            return redirect()->route('transactions.return');
        } elseif ($request->status_id == 5) {
            // Hilang...
            $transaction->update([
                'status_id' => $request->status_id,
                'penalty_total' => $request->penalty ?? 0,

            ]);

            return redirect()->route('penalties.create', $transaction->id);
        } elseif ($request->status_id == 6) {
            // Rusak Ringan...
            $transaction->update([
                'status_id' => $request->status_id,
                'penalty_total' => $request->penalty ?? 0,

            ]);

            return redirect()->route('penalties.create', $transaction->id);
        } elseif ($request->status_id == 7) {
            // Rusak Berat...
            $transaction->update([
                'status_id' => $request->status_id,
                'penalty_total' => $request->penalty ?? 0,

            ]);

            return redirect()->route('penalties.create', $transaction->id);
        } elseif ($request->status_id == 8) {
            // Tolak...
            $transaction->update([
                'status_id' => $request->status_id,
                'penalty_total' => $request->penalty ?? 0,
                'borrow_date' => null,
                'return_date' => null,
            ]);

            return redirect()->route('transactions.return');
        }
    }
}
