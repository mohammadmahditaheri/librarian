<?php

namespace App\Domains\Book\Jobs;

use App\Contracts\DTO\BookDtoInterface;
use App\Services\Books\Contracts\Repositories\BookRepositoryInterface;
use Lucid\Units\Job;

class GetBookWithAllRelationshipsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly BookRepositoryInterface $repository)
    {}

    /**
     * Execute the job.
     *
     * @param int $bookId
     * @return BookDtoInterface|null
     */
    public function handle(int $bookId): ?BookDtoInterface
    {
        return $this->repository->findWithAll($bookId);
    }
}
