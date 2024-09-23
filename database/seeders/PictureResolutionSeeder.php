<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureResolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['picture_id'=>1, 'resolution_id'=>1],
            ['picture_id'=>1, 'resolution_id'=>3],
            ['picture_id'=>2, 'resolution_id'=>3],
            ['picture_id'=>3, 'resolution_id'=>2],
            ['picture_id'=>3, 'resolution_id'=>3],
            ['picture_id'=>4, 'resolution_id'=>1],
        ];
        
        DB::table('picture_resolution')->insert($data);
    }
}
