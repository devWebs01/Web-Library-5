<?php

namespace Database\Seeders;

use App\Models\Penalty;
use App\Models\Status;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 10 transaksi dengan penalty secara otomatis menggunakan factory
        Transaction::factory(10)->create()->each(function ($transaction) {
            // Hanya buat penalty jika transaksi memiliki denda
            if ($transaction->penalty_total > 0) {
                Penalty::factory()->create([
                    'transaction_id' => $transaction->id,
                ]);
            }
        });

        // Ambil status 'Konfirmasi Pinjam' (Dipinjam)
        $statusPinjam = Status::where('name', 'Konfirmasi Pinjam')->first();

        // Ambil 10 transaksi dengan status 'Konfirmasi Pinjam'
        Transaction::factory(10)->create()->each(function ($transaction) use ($statusPinjam) {
            // Update transaksi dengan status 'Konfirmasi Pinjam'
            $transaction->update([
                'status_id' => $statusPinjam->id,
                'penalty_total' => 0, // Tidak ada denda untuk status 'Konfirmasi Pinjam'
            ]);

            // Jika ada status selain 'Konfirmasi Pinjam', beri penalty
            if ($transaction->status_id != $statusPinjam->id) {
                // Ambil status yang memiliki denda
                $statusWithPenalty = Status::whereIn('name', ['Terlambat', 'Hilang', 'Rusak Ringan', 'Rusak Berat'])->get()->random();

                $transaction->update([
                    'status_id' => $statusWithPenalty->id,
                    'penalty_total' => $statusWithPenalty->amount, // Set denda sesuai status
                ]);

                // Hanya buat penalty jika transaksi memiliki denda
                if ($transaction->penalty_total > 0) {
                    Penalty::create([
                        'transaction_id' => $transaction->id,
                        'status' => 'Lunas', // Status penalty
                    ]);
                }
            }
        });

    }
}
