<?php

namespace App\Composables\Data;

use App\Services\Books\Http\Resources\BookResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
