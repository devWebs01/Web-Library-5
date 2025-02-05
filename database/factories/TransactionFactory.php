<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        // Ambil status dengan amount > 0
        $status = Status::where('amount', '>', 0)->inRandomOrder()->first();

        return [
            'code' => 'TRX'.$this->faker->unique()->numberBetween(1000, 9999),
            'book_id' => Book::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'borrow_date' => now(),
            'return_date' => now()->addDays(rand(1, 5)),
            'status_id' => $status ? $status->id : 1, // Default jika tidak ada status
            'penalty_total' => $status ? $status->amount : 0, // Set penalty sesuai status
        ];
    }
}
