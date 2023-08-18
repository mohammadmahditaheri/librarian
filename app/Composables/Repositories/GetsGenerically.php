<?php

namespace App\Composables\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait GetsGenerically
{
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection
    {
        return $this->model::get();
    }
}
