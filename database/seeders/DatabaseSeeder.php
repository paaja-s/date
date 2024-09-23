<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        $this->call(WorkDaySeeder::class);
        $this->call(VacationSeeder::class);
        
        $this->call(AuthorSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(ResolutionSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(PictureResolutionSeeder::class);
        $this->call(PictureTypeSeeder::class);
    }
}
