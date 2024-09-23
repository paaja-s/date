<?php

namespace Database\Seeders;

use App\Models\WorkDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nedele - sobota
        WorkDay::factory()->create([
            'lang' => 'cz',
            'day' => 0,
            'workday' => false
        ]);
        WorkDay::factory()->create([
            'lang' => 'cz',
            'day' => 1,
            'workday' => true
        ]);
        WorkDay::factory()->create([
            'lang' => 'cz',
            'day' => 2,
            'workday' => true
        ]);
        WorkDay::factory()->create([
            'lang' => 'cz',
            'day' => 3,
            'workday' => true
        ]);
        WorkDay::factory()->create([
            'lang' => 'cz',
            'day' => 4,
            'workday' => true
        ]);
        WorkDay::factory()->create([
            'lang' => 'cz',
            'day' => 5,
            'workday' => true
        ]);
        WorkDay::factory()->create([
            'lang' => 'cz',
            'day' => 6,
            'workday' => false
        ]);
    }
}
