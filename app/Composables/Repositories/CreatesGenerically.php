<?php

namespace App\Composables\Repositories;

trait CreatesGenerically
{
    public function create(array $data)
    {
        return $this->model::create($data);
    }
}
