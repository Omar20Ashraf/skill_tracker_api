<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(10),
            'tags' => ['laravel', 'backend', 'api'],
            'metadata' => [
                'level' => $this->faker->randomElement(['beginner', 'intermediate', 'advanced']),
                'source' => $this->faker->randomElement(['YouTube', 'Blog', 'Course']),
                'hours_practiced' => $this->faker->numberBetween(10, 100)
            ],
        ];
    }
}
