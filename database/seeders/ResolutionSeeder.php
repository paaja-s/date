<?php

namespace Database\Seeders;

use App\Models\Resolution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resolution::factory()->create([
            'height' => 768,
            'width' => 1024,
        ]);
        Resolution::factory()->create([
            'height' => 2000,
            'width' => 3000,
        ]);
        Resolution::factory()->create([
            'height' => 1200,
            'width' => 1600,
        ]);
    }
}
