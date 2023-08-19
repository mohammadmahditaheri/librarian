<?php

namespace App\Services\Books\Contracts\Repositories;

use App\Contracts\DTO\BookDtoInterface;
use App\Data\Models\Book;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection;

    public function create(BookDtoInterface $bookDTO): ?BookDtoInterface;

    public function find(int $bookId): ?BookDtoInterface;

    public function findWithCopies(int $bookId): ?BookDtoInterface;

    public function findWithAll(int $bookId): ?BookDtoInterface;

    public function findModel(int $bookId): ?Book;
}
