<?php

namespace App\Foundation\ValueObjects\Responses;

class AndroidResponseValues extends ResponseValues
{
    public function getBody(): array
    {
        return [
            'status_code' => $this->statusCode,
            'is_successful' => (bool) $this->isSuccessful,
            'android_data' => $this->data,
            'android_message' => $this->message,
            'android_extra' => $this->extra
        ];
    }
}
