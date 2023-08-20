<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\AndroidResponseValues;

trait SendsResponseForAndroidAgent
{
    use SendsResponse;

    const GENERIC_EXTRA = 'This response is being requested by an android user agent.';

    private string $responseValuesClass = AndroidResponseValues::class;
}
