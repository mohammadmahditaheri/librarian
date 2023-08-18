<?php

namespace App\Services\Books\Providers;

use App\Services\Books\Contracts\Repositories\AuthorRepositoryInterface;
use App\Services\Books\Contracts\Repositories\CategoryRepositoryInterface;
use App\Services\Books\Contracts\Repositories\LanguageRepositoryInterface;
use App\Services\Books\Contracts\Repositories\PublisherRepositoryInterface;
use App\Services\Books\Repositories\AuthorRepository;
use App\Services\Books\Repositories\CategoryRepository;
use App\Services\Books\Repositories\LanguageRepository;
use App\Services\Books\Repositories\PublisherRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->bindings();
    }

    /**
     * Bootstrap services.
     */
    public function bindings(): void
    {
        $this->app->bind(
            LanguageRepositoryInterface::class,
            LanguageRepository::class
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            PublisherRepositoryInterface::class,
            PublisherRepository::class
        );
        $this->app->bind(
            AuthorRepositoryInterface::class,
            AuthorRepository::class
        );
    }
}
