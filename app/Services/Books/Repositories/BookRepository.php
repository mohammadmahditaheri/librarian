<?php

namespace App\Services\Books\Repositories;

use App\Contracts\DTO\BookDtoInterface;
use App\Data\DTO\BookDTO;
use App\Data\Models\Book;
use App\Services\Books\Contracts\Repositories\BookRepositoryInterface;
use App\Services\Books\ValueObjects\BookFiltersData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection
    {
        return Book::all(Book::COLUMNS);
    }

    public function create(BookDtoInterface $bookDTO): ?BookDtoInterface
    {
        $persistable = $bookDTO->toArray();
        if (!count($persistable)) {
            return null;
        }

        return BookDTO::from(
            Book::create($persistable)
        );
    }

    public function find(int $bookId): ?BookDtoInterface
    {
        $bookModel = $this->findModel($bookId);
        if (!$bookModel) {
            return null;
        }

        return BookDTO::from($bookModel);
    }

    public function findWithCopies(int $bookId): ?BookDtoInterface
    {
        $bookModel = $this->findModelJoinedWith($bookId, 'copies');
        if (!$bookModel) {
            return null;
        }

        return BookDTO::from($bookModel);
    }

    public function findWithAll(int $bookId): ?BookDtoInterface
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

    public function getPaginatedByParams(BookFiltersData $filtersData): LengthAwarePaginator
    {
        $filterQueries = $this->filterQueries($filtersData);

        $queryBuilder = Book::query();
        // filter repeated data in the table
        foreach ($filterQueries as $property => $filterQuery) {
            $queryBuilder->when($filtersData->$property, $filterQuery);
        }

        return $queryBuilder->when($filtersData->search_query, function ($query) use ($filtersData) {
            $query->where('title', 'like', '%' . $filtersData->search_query . '%')
                ->orWhere('description', 'like', '%' . $filtersData->search_query . '%');
        })
            ->when($filtersData->author_id, function ($query) use ($filtersData) {
                $query->whereHas('authors', function (Builder $query) use ($filtersData) {
                    $query->where('id', $filtersData->author_id);
                });
            })
            ->paginate($filtersData->perPage);
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

    public function filterQueries(BookFiltersData $filtersData): array
    {
        $queries = [];
        foreach ($filtersData as $property => $value) {
            if ($property !== 'search_query' &&
                $property !== 'perPage' &&
                $property !== 'author_id'
            ) {
                $queries[$property] = function ($query) use ($property, $value) {
                    $query->where($property, $value);
                };
            }
        }

        return $queries;
    }
}
