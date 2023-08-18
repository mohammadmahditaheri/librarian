<?php

namespace App\Services\Books\database\seeders;

use App\Data\Models\Author;
use App\Data\Models\Book;
use App\Services\Books\Contracts\Repositories\AuthorRepositoryInterface;
use App\Services\Books\Contracts\Repositories\CategoryRepositoryInterface;
use App\Services\Books\Contracts\Repositories\LanguageRepositoryInterface;
use App\Services\Books\Contracts\Repositories\PublisherRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function __construct(
        private readonly LanguageRepositoryInterface  $languageRepository,
        private readonly CategoryRepositoryInterface  $categoryRepository,
        private readonly PublisherRepositoryInterface $publisherRepository,
        private readonly AuthorRepositoryInterface    $authorRepository,
    )
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = $this->languageRepository->getAll();
        $authors = $this->authorRepository->getAll();
        $publishers = $this->publisherRepository->getAll();
        $categories = $this->categoryRepository->getAll();

        $books = Book::factory()
            ->count(100)
            ->has(Author::factory()->count(2))
            ->for($this->getRandom($categories), 'category')
            ->for($this->getRandom($publishers), 'publisher')
            ->for($this->getRandom($languages), 'language')
            ->create();
    }

    private function getRandom(Collection|\Illuminate\Support\Collection $collection)
    {
        $lastIndex = count($collection->toArray()) - 1;
        return $collection[rand(0, $lastIndex)];
    }
}
