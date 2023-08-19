<?php

namespace App\Services\Books\Contracts\Repositories;

use App\Data\DTO\BookDTO;
use App\Data\Models\Book;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection;

    public function create(BookDTO $bookDTO): ?BookDTO;

    public function find(int $bookId): ?BookDTO;

    public function findWithCopies(int $bookId): ?BookDTO;

    public function findWithAll(int $bookId): ?BookDTO;

    public function findModel(int $bookId): ?Book;
}
