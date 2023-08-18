<?php

namespace App\Contracts\Repositories;


use Illuminate\Support\Collection;

interface GenericReaderRepositoryInterface
{
    // it is only being used on ref tables
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection;
}
