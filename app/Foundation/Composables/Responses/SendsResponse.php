<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\ResponseValues;
use Illuminate\Http\Response;

trait SendsResponse
{
    public function sendData($data): Response
    {
        return response(
            $this->assembleDataResponse($data, self::GENERIC_EXTRA)->getBody()
        );
    }

    private function assembleForAgent(
        string $responseValueClass,
        mixed $data,
        mixed $extra
    )
    {
        return (new $responseValueClass())
            ->succeed()
            ->setOk()
            ->setData($data)
            ->setExtra($extra);
    }
}
