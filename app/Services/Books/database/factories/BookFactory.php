<?php

namespace App\Services\Books\database\factories;

use App\Data\Models\Book;
use App\Data\Models\Category;
use App\Data\Models\Language;
use App\Data\Models\Publisher;
use App\Services\Books\Contracts\Repositories\CategoryRepositoryInterface;
use App\Services\Books\Contracts\Repositories\LanguageRepositoryInterface;
use App\Services\Books\Contracts\Repositories\PublisherRepositoryInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $minimumPages = 100;
        $maximumPages = 1000;

        $titlePrefixes = [
            'A First Course In ',
            'An Introduction to ',
            'A Deep Dive Into '
        ];

        /**
         * @var LanguageRepositoryInterface $languageRepository
         */
        $languageRepository = resolve(LanguageRepositoryInterface::class);

        /**
         * @var CategoryRepositoryInterface $categoryRepository
         */
        $categoryRepository = resolve(CategoryRepositoryInterface::class);

        /**
         * @var PublisherRepositoryInterface $publisherRepository
         */
        $publisherRepository = resolve(PublisherRepositoryInterface::class);

        return [
            'publisher_id' => function (array $attributes) use ($publisherRepository) {
                return $publisherRepository->find($attributes['publisher_id'])->id;
            },
            'category_id' => function (array $attributes) use ($categoryRepository) {
                return $categoryRepository->find($attributes['category_id'])->id;
            },
            'language_id' => function (array $attributes) use ($languageRepository) {
                return $languageRepository->find($attributes['language_id'])->id;
            },
            'title' => $titlePrefixes[rand(0, count($titlePrefixes) - 1)] . fake()->words(asText: true),
            'description' => fake()->realText(100),
            'published_at_year' => fake()->year,
            'number_of_pages' => fake()->numberBetween($minimumPages, $maximumPages),
        ];
    }
}
