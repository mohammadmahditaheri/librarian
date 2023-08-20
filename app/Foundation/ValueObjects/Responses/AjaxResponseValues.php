<?php

namespace App\Foundation\ValueObjects\Responses;

class AjaxResponseValues extends ResponseValues
{
    public function getBody(): array
    {
        return [
            'status_code' => $this->statusCode,
            'is_successful' => (bool) $this->isSuccessful,
            'ajax_data' => $this->data,
            'ajax_message' => $this->message,
            'ajax_extra' => $this->extra
        ];
    }
}
