<?php

namespace App\Services\Books\database\seeders;

use App\Data\Models\Author;
use App\Services\Books\Contracts\Repositories\AuthorRepositoryInterface;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function __construct(private readonly AuthorRepositoryInterface $repository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $this->repository->create([
                'full_name' => fake()->name(),
                'updated_at' => null
            ]);
        }
    }
}
