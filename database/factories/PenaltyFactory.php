<?php

namespace Database\Factories;

use App\Models\Penalty;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penalty>
 */
class PenaltyFactory extends Factory
{
    protected $model = Penalty::class;

    public function definition()
    {
        return [
            'transaction_id' => Transaction::factory(),
            'status' => 'Lunas',
        ];
    }
}
