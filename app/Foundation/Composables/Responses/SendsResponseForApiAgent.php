<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\ApiResponseValue;

trait SendsResponseForApiAgent
{
    use SendsResponse;

    const GENERIC_EXTRA = 'This response is being requested by an api user agent.';

    private function assembleDataResponse(mixed $data, mixed $extra = null): ApiResponseValue
    {
        return $this->assembleForAgent(
            responseValueClass: ApiResponseValue::class,
            data: $data,
            extra: $extra
        );
    }
}
