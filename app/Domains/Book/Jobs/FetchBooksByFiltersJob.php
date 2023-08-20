<?php

namespace App\Domains\Book\Jobs;

use App\Services\Books\Contracts\Repositories\BookRepositoryInterface;
use App\Services\Books\ValueObjects\BookFiltersData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lucid\Units\Job;

class FetchBooksByFiltersJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly BookRepositoryInterface $repository)
    {}

    /**
     *  Execute the job.
     *
     * @param BookFiltersData $filtersData
     * @return LengthAwarePaginator
     */
    public function handle(BookFiltersData $filtersData): LengthAwarePaginator
    {
        return $this->repository->getPaginatedByParams($filtersData);
    }
}
