<?php

namespace App\Services\Books\database\seeders;

use App\Services\Books\Contracts\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookCopySeeder extends Seeder
{
    public function __construct(private readonly BookRepositoryInterface $repository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * @var Collection<\App\Data\Models\Book> $books
         */
        $books = $this->repository->getAll();
        foreach ($books as $book) {
            $book->copies()->create([
                'library_code' => $book->category->name . '_' . Str::random(),
                'updated_at' => null
            ]);
        }
    }
}
