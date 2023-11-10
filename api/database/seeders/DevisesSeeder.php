<?php

namespace Database\Seeders;

use App\Models\Devises;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Devises::factory()
                ->count(6)
                ->sequence(
                    ['name' => 'ETC'],
                    ['name' => 'DL'],
                    ['name' => 'EUR'],
                    ['name' => 'YEN'],
                    ['name' => 'PQ'],
                    ['name' => 'FR'],
                )
                ->create();
    }
}
