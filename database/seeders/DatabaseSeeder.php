<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Nationalities;
use Illuminate\Database\Seeder;
use religionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call(BloodTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        // $this->call(ReligionTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
    }
}
