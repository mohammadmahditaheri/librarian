<?php

namespace App\Foundation\ValueObjects\Responses;

class IosResponseValues extends ResponseValues
{
    public function getBody(): array
    {
        return [
            'status_code' => $this->statusCode,
            'is_successful' => (bool) $this->isSuccessful,
            'ios_data' => $this->data,
            'ios_message' => $this->message,
            'ios_extra' => $this->extra
        ];
    }
}
