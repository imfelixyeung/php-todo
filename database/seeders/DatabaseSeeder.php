<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Felix',
            'email' => 'me@felixyeung.com',
        ]);

        Todo::create([
            "name" => "Learn Laravel",
            "completed" => true,
        ]);
        Todo::create([
            "name" => "Learn PHP",
            "completed" => true,
        ]);
        Todo::create([
            "name" => "Learn MySQL",
            "completed" => false,
        ]);

        Todo::factory(50)->create();
    }
}
