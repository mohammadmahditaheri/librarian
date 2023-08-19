<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\AndroidResponseValues;
use App\Foundation\ValueObjects\Responses\ApiResponseValue;
use Illuminate\Http\Response;

trait SendsResponseForAndroidAgent
{
    use SendsResponse;

    const GENERIC_EXTRA = 'This response is being requested by an android user agent.';

    private function assembleDataResponse(mixed $data, mixed $extra = null): AndroidResponseValues
    {
        return $this->assembleForAgent(
            responseValueClass: AndroidResponseValues::class,
            data: $data,
            extra: $extra
        );
    }
}
