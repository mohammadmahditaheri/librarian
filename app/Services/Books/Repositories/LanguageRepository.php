<?php

namespace App\Services\Books\Repositories;

use App\Composables\Repositories\CreatesGenerically;
use App\Composables\Repositories\FindsGenerically;
use App\Composables\Repositories\GetsGenerically;
use App\Data\Models\Language;
use App\Services\Books\Contracts\Repositories\LanguageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class LanguageRepository implements LanguageRepositoryInterface
{
    use CreatesGenerically,
        FindsGenerically,
        GetsGenerically;

    /**
     * @var class-string<Model>
     */
    private string $model = Language::class;
}
