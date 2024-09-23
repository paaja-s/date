<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['picture_id'=>1, 'type_id'=>1],
            ['picture_id'=>4, 'type_id'=>4],
            ['picture_id'=>3, 'type_id'=>3],
            ['picture_id'=>4, 'type_id'=>2],
            ['picture_id'=>2, 'type_id'=>2],
            ['picture_id'=>1, 'type_id'=>2],
            ['picture_id'=>4, 'type_id'=>1],
            ['picture_id'=>2, 'type_id'=>3],
        ];
        
        DB::table('picture_type')->insert($data);
    }
}
