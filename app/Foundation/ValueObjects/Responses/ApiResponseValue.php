<?php

namespace App\Foundation\ValueObjects\Responses;

use App\Foundation\ValueObjects\Responses\ResponseValues;

class ApiResponseValue extends ResponseValues
{
    public function getBody(): array
    {
        return [
            'status_code' => $this->statusCode,
            'is_successful' => (bool) $this->isSuccessful,
            'api_data' => $this->data,
            'api_message' => $this->message,
            'api_extra' => $this->extra
        ];
    }
}
