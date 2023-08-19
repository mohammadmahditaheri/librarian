<?php

namespace App\Providers;

use App\Contracts\DTO\BookDtoInterface;
use App\Data\DTO\BookDTO;
use Illuminate\Support\ServiceProvider;

class DtoProvider extends ServiceProvider
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
        $this->app->bind(BookDtoInterface::class, BookDTO::class);
    }
}
