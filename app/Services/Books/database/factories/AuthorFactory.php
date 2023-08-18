<?php

namespace App\Services\Books\database\factories;

use App\Data\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Model>
 */
class AuthorFactory extends Factory
{
    /**
     * @var class-string<Author> $model
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'updated_at' => null
        ];
    }
}
