<?php

namespace App\Foundation\Strategies\Presenter;

use Illuminate\Http\Exceptions\HttpResponseException;

interface PresenterStrategyInterface
{
    public function presentData(mixed $data);

    /**
     * @throws HttpResponseException
     */
    public function presentNotFoundError(mixed $extra, string $message);
}
