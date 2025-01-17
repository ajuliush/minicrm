<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id');
        $clients = Client::pluck('id');
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
            'deadline_at' => fake()->date,
            'status' => fake()->randomElement(ProjectStatus::cases())->value,
        ];
    }
}