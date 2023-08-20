<?php

namespace App\Services\Books\Contracts\Repositories;

use App\Contracts\DTO\BookDtoInterface;
use App\Data\Models\Book;
use App\Services\Books\ValueObjects\BookFiltersData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection;

    public function getPaginatedByParams(BookFiltersData $filtersData): LengthAwarePaginator;

    public function create(BookDtoInterface $bookDTO): ?BookDtoInterface;

    public function find(int $bookId): ?BookDtoInterface;

    public function findWithCopies(int $bookId): ?BookDtoInterface;

    public function findWithAll(int $bookId): ?BookDtoInterface;

    public function findModel(int $bookId): ?Book;
}
