<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

interface GenericFinderRepositoryInterface
{
    public function find(int $id): ?Model;
}
