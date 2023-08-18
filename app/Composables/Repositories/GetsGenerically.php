<?php

namespace App\Composables\Repositories;

use Illuminate\Database\Eloquent\Model;

trait GetsGenerically
{
    public function getAll(): ?Model
    {
        return $this->model::get();
    }
}
