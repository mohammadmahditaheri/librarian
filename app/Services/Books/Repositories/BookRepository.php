<?php

namespace App\Services\Books\Repositories;

use App\Data\DTO\BookDTO;
use App\Data\Models\Book;
use App\Services\Books\Contracts\Repositories\BookRepositoryInterface;
use Illuminate\Support\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection
    {
        return Book::all(Book::COLUMNS);
    }

    public function create(BookDTO $bookDTO): ?BookDTO
    {
        $persistable = $bookDTO->toArray();
        if (!count($persistable)) {
            return null;
        }

        return BookDTO::from(
            Book::create($persistable)
        );
    }

    public function find(int $bookId): ?BookDTO
    {
        $bookModel = $this->findModel($bookId);
        if (!$bookModel) {
            return null;
        }

        return BookDTO::from($bookModel);
    }

    public function findWithCopies(int $bookId): ?BookDTO
    {
        $bookModel = $this->findModelJoinedWith($bookId, 'copies');
        if (!$bookModel) {
            return null;
        }

        return BookDTO::from($bookModel);
    }

    public function findWithAll(int $bookId): ?BookDTO
    {
        $model = $this->findModelJoinedWith($bookId, [
            'authors',
            'category',
            'publisher',
            'language',
            'copies',
        ]);

        return BookDTO::from($model);
    }

    public function findModel(int $bookId): ?Book
    {
        return Book::select(...Book::COLUMNS)->where('id', $bookId)->first();
    }

    /**
     * ---------------------------------------------------
     * ---------------- Private Methods ------------------
     * ---------------------------------------------------
     */


    private function findModelJoinedWith(int $bookId, string|array $relationships): ?Book
    {
        return Book::select(...Book::COLUMNS)
            ->where('id', $bookId)
            ->with($relationships)
            ->first();
    }
}
