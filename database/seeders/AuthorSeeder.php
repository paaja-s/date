<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()->create([
            'first_name'=>'Leonardo',
            'last_name'=>'da Vinci'
        ]);
        Author::factory()->create([
            'first_name'=>'Jan',
            'last_name'=>'Vermeer'
        ]);
        Author::factory()->create([
            'first_name'=>'Dirck',
            'last_name'=>'van Baburen'
        ]);
    }
}
