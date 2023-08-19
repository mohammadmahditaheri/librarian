<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\ApiResponseValues;

trait SendsResponseForApiAgent
{
    use SendsResponse;

    const GENERIC_EXTRA = 'This response is being requested by an api user agent.';

    private string $responseValuesClass = ApiResponseValues::class;
}
