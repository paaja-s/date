<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory()->create([
            'name' => 'jpg',
        ]);
        Type::factory()->create([
            'name' => 'png',
        ]);
        Type::factory()->create([
            'name' => 'tiff',
        ]);
        Type::factory()->create([
            'name' => 'bmp',
        ]);
    }
}
