<?php

namespace Database\Seeders;

use App\Models\Activity;
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
        $user = User::factory()->create([
            'name' => 'Felix',
            'email' => 'me@felixyeung.com',
            'password' => 'example:password:123'
        ]);

        Activity::factory()
            ->user($user)
            ->todo(
                Todo::create([
                    "name" => "Learn Laravel",
                    "completed" => true,
                    'user_id' => $user->id,
                ])
            )->create();
        Activity::factory()
            ->user($user)
            ->todo(
                Todo::create([
                    "name" => "Learn PHP",
                    "completed" => true,
                    'user_id' => $user->id,
                ])
            )->create();
        Activity::factory()
            ->user($user)
            ->todo(
                Todo::create([
                    "name" => "Learn MySQL",
                    "completed" => false,
                    'user_id' => $user->id,
                ])
            )->create();

        User::factory(42)->create()->each(function (User $user) {
            Todo::factory()->has(Activity::factory()->user($user))->create(["user_id" => $user->id]);
        });
    }
}
