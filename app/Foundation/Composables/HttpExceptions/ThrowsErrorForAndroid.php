<?php

namespace App\Foundation\Composables\HttpExceptions;

use App\Foundation\ValueObjects\Responses\AndroidResponseValues;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ThrowsErrorForAndroid
{
    const GENERIC_ERROR_EXTRA = 'This error is being returned to a android requester.';
    const DEFAULT_ERROR_MESSAGE = 'The requested resource does not exist.';

    /**
     * @throws HttpResponseException
     */
    public function notFoundResponse(
        mixed  $extra = self::GENERIC_ERROR_EXTRA,
        string $message = self::DEFAULT_ERROR_MESSAGE
    )
    {
        throw new HttpResponseException(response(
            $this->assembleNotFoundException($extra, $message)->getBody()
        ));
    }

    private function assembleNotFoundException(mixed $extra, string $message): AndroidResponseValues
    {
        return (new AndroidResponseValues())
            ->fail()
            ->setNotFoundStatus()
            ->setExtra($extra)
            ->setMessage($message);
    }
}
