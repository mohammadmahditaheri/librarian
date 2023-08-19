<?php

namespace App\Foundation\Composables\Responses;

use Illuminate\Http\Response;

trait SendsResponse
{
    public function sendData($data): Response
    {
        return response(
            $this->assembleDataResponse($data, self::GENERIC_EXTRA)->getBody()
        );
    }

    private function assembleDataResponse(mixed $data, mixed $extra = null)
    {
        return (new $this->responseValuesClass())
            ->succeed()
            ->setOk()
            ->setData($data)
            ->setExtra($extra);
    }
}
