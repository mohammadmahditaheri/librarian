<?php

namespace App\Composables\Repositories;

use Illuminate\Database\Eloquent\Model;

trait FindsGenerically
{
    public function find(int $id): ?Model
    {
        return $this->model::where('id', $id)->first();
    }
}
