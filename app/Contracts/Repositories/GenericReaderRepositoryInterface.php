<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

interface GenericReaderRepositoryInterface
{
    public function getAll(): ?Model; // it is only being used on ref tables like
}
