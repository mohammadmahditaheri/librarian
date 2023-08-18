<?php

namespace App\Services\Books\Repositories;

use App\Composables\Repositories\ImplementsGenericRepository;
use App\Data\Models\Publisher;
use App\Services\Books\Contracts\Repositories\PublisherRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PublisherRepository implements PublisherRepositoryInterface
{
    use ImplementsGenericRepository;

    /**
     * @var class-string<Model>
     */
    private string $model = Publisher::class;
}
