<?php

namespace App\Services\Books\database\seeders;

use App\Services\Books\Contracts\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function __construct(private readonly CategoryRepositoryInterface $repository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->seedableCategories() as $category) {
            $this->repository->create($category);
        }
    }

    private function seedableCategories(): array
    {
        return [
            ['name' => 'math'],
            ['name' => 'chemistry'],
            ['name' => 'physics'],
            ['name' => 'computer science'],
        ];
    }
}
