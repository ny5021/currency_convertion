<?php

namespace Database\Seeders;

use App\Models\Paires;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paires::factory()
                    ->count(3)
                    ->create();
    }
}
