<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\AjaxResponseValues;

trait SendsResponseForAjaxAgent
{
    use SendsResponse;

    const GENERIC_EXTRA = 'This response is being requested by an ajax user agent.';

    private string $responseValuesClass = AjaxResponseValues::class;
}
