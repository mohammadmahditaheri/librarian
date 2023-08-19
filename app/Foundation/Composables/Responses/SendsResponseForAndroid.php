<?php

namespace App\Foundation\Composables\Responses;

use App\Foundation\ValueObjects\Responses\AndroidResponseValues;
use Illuminate\Http\Response;

trait SendsResponseForAndroid
{
    const GENERIC_EXTRA = 'This response is being requested by an android user agent';

    public function sendData($data): Response
    {
        return response(
            $this->assemble($data, self::GENERIC_EXTRA)->getBody()
        );
    }

    public function assemble(mixed $data, mixed $extra = null): AndroidResponseValues
    {
        return (new AndroidResponseValues())
            ->succeed()
            ->setOk()
            ->setData($data)
            ->setExtra($extra);
    }
}
