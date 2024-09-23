<?php

namespace Database\Seeders;

use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Picture::factory()->create([
            'name' => 'Mona Lisa',
            'author_id' => 1,
        ]);
        Picture::factory()->create([
            'name' => 'Divka s perlou',
            'author_id' => 2,
        ]);
        Picture::factory()->create([
            'name' => 'Chlapec s bubinkem',
            'author_id' => 3,
        ]);
        Picture::factory()->create([
            'name' => 'Astronom',
            'author_id' => 2,
        ]);
        
    }
}
