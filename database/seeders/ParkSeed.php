<?php

namespace Database\Seeders;

use App\Models\Park;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParkSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Park::factory()->count(10)->create();
    }
}
