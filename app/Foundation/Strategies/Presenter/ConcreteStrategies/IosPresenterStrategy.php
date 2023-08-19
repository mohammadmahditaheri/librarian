<?php

namespace App\Foundation\Strategies\Presenter\ConcreteStrategies;

use App\Foundation\Strategies\Presenter\PresenterStrategyInterface;

class IosPresenterStrategy implements PresenterStrategyInterface
{

    public function presentData(mixed $data)
    {
        // TODO: Implement present() method.
    }

    /**
     * @inheritDoc
     */
    public function presentNotFoundError(mixed $extra, string $message)
    {
        // TODO: Implement presentNotFoundError() method.
    }
}