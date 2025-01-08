<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Menunggu Konfirmasi', // 1
                'amount' => 0,
            ],
            [
                'name' => 'Konfirmasi (Berjalan)', // 2
                'amount' => 0,
            ],
            [
                'name' => 'Terlambat', // 3
                'amount' => '500'
            ],
            [
                'name' => 'Dikembalikan', // 4
                'amount' => 0,
            ],
            [
                'name' => 'Hilang', // 5
                'amount' => '50000'
            ],
            [
                'name' => 'Rusak Ringan', // 6
                'amount' => '5000'
            ],
            [
                'name' => 'Rusak Berat', // 7
                'amount' => '10000'
            ],
            [
                'name' => 'Tolak', // 8
                'amount' => 0,
            ],

        ];
        foreach ($statuses as $status) {
           Status::create($status);
        }
    }
}
