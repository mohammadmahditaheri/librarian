<?php

namespace App\Services\Books\Repositories;

use App\Data\Models\Publisher;
use App\Foundation\Composables\Repositories\ImplementsGenericRepository;
use App\Services\Books\Contracts\Repositories\PublisherRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PublisherRepository implements PublisherRepositoryInterface
{
    use ImplementsGenericRepository;

    /**
     * @var class-string<Model> $model
     */
    private string $model = Publisher::class;
}
