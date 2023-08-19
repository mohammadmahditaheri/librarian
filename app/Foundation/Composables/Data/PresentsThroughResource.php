<?php

namespace App\Foundation\Composables\Data;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * The Data that uses this composable should have $model property
 * and also $resourceClass as class-string in his properties
 */
trait PresentsThroughResource
{
    public function present(): JsonResource
    {
        return new $this->resourceClass($this->model);
    }
}
