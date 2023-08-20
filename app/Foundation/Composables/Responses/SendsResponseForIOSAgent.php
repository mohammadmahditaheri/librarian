<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\IosResponseValues;

trait SendsResponseForIOSAgent
{
    use SendsResponse;

    const GENERIC_EXTRA = 'This response is being requested by an ios user agent.';

    private string $responseValuesClass = IosResponseValues::class;
}
