<?php

namespace App\Foundation\Composables\Repositories;

trait CreatesGenerically
{
    public function create(array $data)
    {
        return $this->model::create($data);
    }
}
