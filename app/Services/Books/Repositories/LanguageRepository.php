<?php

namespace App\Services\Books\Repositories;

use App\Data\Models\Language;
use App\Foundation\Composables\Repositories\ImplementsGenericRepository;
use App\Services\Books\Contracts\Repositories\LanguageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class LanguageRepository implements LanguageRepositoryInterface
{
    use ImplementsGenericRepository;

    /**
     * @var class-string<Model> $model
     */
    private string $model = Language::class;
}
