<?php

namespace Database\Factories;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'create',
            'user_id' => User::factory(),
            'todo_id' => Todo::factory(),
        ];
    }

    public function name(string $name): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => $name
        ]);
    }

    public function user(User $user): static
    {
        return $this->state(fn(array $attributes) => [
            'user_id' => $user
        ]);
    }

    public function todo(Todo $todo): static
    {
        return $this->state(fn(array $attributes) => [
            'todo_id' => $todo
        ]);
    }
}
