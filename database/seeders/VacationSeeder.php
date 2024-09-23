<?php

namespace Database\Seeders;

use App\Models\Vacation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Svatky pevne ------------------------
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'01-01',
            'name'=>'Novy rok'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'05-01',
            'name'=>'Svatek prace'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'05-08',
            'name'=>'Den vitezstvi'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'07-05',
            'name'=>'Den slovanskych verozvestu'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'07-06',
            'name'=>'Jan Hus'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'09-28',
            'name'=>'Den ceske stanosti'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'10-28',
            'name'=>'Den vzniku CSR'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'11-17',
            'name'=>'Den boje studentu za demokracii'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'12-24',
            'name'=>'Stedry vecer'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'12-25',
            'name'=>'Prvni svatek vanocni'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'12-26',
            'name'=>'Druhy svatek vanocni'
        ]);
        
        // Svatky pohyblive --------------------
        // 2024
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'2024-03-29',
            'name'=>'Velky patek'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'2024-04-01',
            'name'=>'Velikonoce'
        ]);
        // 2025
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'2025-04-18',
            'name'=>'Velky patek'
        ]);
        Vacation::factory()->create([
            'lang'=>'cz',
            'date'=>'2025-04-21',
            'name'=>'Velikonoce'
        ]);
    }
}
