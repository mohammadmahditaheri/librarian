<?php

namespace App\Services\Books\database\seeders;

use App\Services\Books\Contracts\Repositories\PublisherRepositoryInterface;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    public function __construct(private readonly PublisherRepositoryInterface $repository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->repository->create([
                'name' => fake()->company() . ' publishing company'
            ]);
        }
    }
}
