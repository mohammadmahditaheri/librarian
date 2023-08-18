<?php

namespace App\Services\Books\Contracts\Repositories;

use App\Contracts\Repositories\GenericCreatorRepositoryInterface;
use App\Contracts\Repositories\GenericFinderRepositoryInterface;
use App\Contracts\Repositories\GenericReaderRepositoryInterface;

interface LanguageRepositoryInterface extends
    GenericCreatorRepositoryInterface,
    GenericFinderRepositoryInterface,
    GenericReaderRepositoryInterface
{
}
