<?php

namespace App\Foundation\Composables\Repositories;

use Illuminate\Support\Collection;

trait GetsGenerically
{
    public function getAll(): Collection|\Illuminate\Database\Eloquent\Collection
    {
        return $this->model::get();
    }
}
