<?php

namespace App\Foundation\Strategies\Presenter;

use Illuminate\Http\Exceptions\HttpResponseException;

class PresenterContext
{
    public function __construct(private PresenterStrategyInterface $presenterStrategy)
    {
    }

    public function present(mixed $data)
    {
        return $this->presenterStrategy->presentData($data);
    }

    /**
     * @throws HttpResponseException
     */
    public function presentNotFoundError(mixed $extra, ?string $message)
    {
        throw $this->presenterStrategy->presentNotFoundError($extra, $message);
    }
}
