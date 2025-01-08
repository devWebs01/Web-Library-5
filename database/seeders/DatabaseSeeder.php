<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Category::factory(10)->create();

        $this->call([
            UserSeeder::class,
            StatusSeeder::class,
            APISeeder::class,
        ]);

        // Transaction::factory(10)->create();

    }
}
