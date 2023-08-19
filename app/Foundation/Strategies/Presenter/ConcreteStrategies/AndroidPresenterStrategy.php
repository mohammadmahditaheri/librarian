<?php

namespace App\Foundation\Strategies\Presenter\ConcreteStrategies;

use App\Foundation\Composables\HttpExceptions\ThrowsErrorForAndroid;
use App\Foundation\Composables\Responses\SendsResponseForAndroid;
use App\Foundation\Strategies\Presenter\PresenterStrategyInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class AndroidPresenterStrategy implements PresenterStrategyInterface
{
    use SendsResponseForAndroid,
        ThrowsErrorForAndroid;

    public function presentData(mixed $data): Response
    {
        return $this->sendData($data);
    }

    /**
     * @throws HttpResponseException
     */
    public function presentNotFoundError(mixed $extra, ?string $message)
    {
        throw $this->notFoundResponse($extra, $message);
    }
}
