<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\IosResponseValues;

trait SendsResponseForIOSAgent
{
    use SendsResponse;

    const GENERIC_EXTRA = 'This response is being requested by an android user agent.';

    private function assembleDataResponse(mixed $data, mixed $extra = null): IosResponseValues
    {
        return $this->assembleForAgent(
            responseValueClass: IosResponseValues::class,
            data: $data,
            extra: $extra
        );
    }
}
