<?php

namespace App\Foundation\Strategies\Presenter\ConcreteStrategies;

use App\Foundation\Composables\Responses\SendsResponseForAjaxAgent;
use App\Foundation\Strategies\Presenter\PresenterStrategyInterface;
use Illuminate\Http\Response;

class AjaxPresenterStrategy implements PresenterStrategyInterface
{
    use SendsResponseForAjaxAgent;

    public function presentData(mixed $data): Response
    {
        return $this->sendData($data);
    }

    /**
     * @inheritDoc
     */
    public function presentNotFoundError(mixed $extra, string $message)
    {
        // TODO: Implement presentNotFoundError() method.
    }
}
