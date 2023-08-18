<?php

namespace App\Services\Books\database\seeders;

use App\Services\Books\Contracts\Repositories\LanguageRepositoryInterface;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function __construct(private readonly LanguageRepositoryInterface $repository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->seedableLanguages() as $language) {
            $this->repository->create($language);
        }
    }

    private function seedableLanguages(): array
    {
        return [
            ['name' => 'farsi'],
            ['name' => 'english'],
            ['name' => 'german'],
        ];
    }
}
