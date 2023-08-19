<?php

namespace App\Foundation\Composables\Data;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * The Data that uses this composable should have $model property
 * and also $resourceClass as class-string in his properties
 */
trait PresentsThroughResource
{
    public function wrapInResource(): JsonResource
    {
        /**
         * @var class-string<JsonResource> $resourceClass
         */
        $resourceClass = $this->getResourceClass();
        return new $resourceClass($this->getModel());
    }
}
