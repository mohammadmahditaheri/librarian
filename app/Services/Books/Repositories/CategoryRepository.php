<?php

namespace App\Services\Books\Repositories;

use App\Composables\Repositories\ImplementsGenericRepository;
use App\Data\Models\Category;
use App\Services\Books\Contracts\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements CategoryRepositoryInterface
{
    use ImplementsGenericRepository;

    /**
     * @var class-string<Model> $model
     */
    private string $model = Category::class;
}
