<?php

namespace App\Foundation\Strategies\Presenter;

class PresenterContext
{
    public function __construct(private PresenterStrategyInterface $presenterStrategy)
    {
    }

    public function present(mixed $data)
    {
        return $this->presenterStrategy->presentData($data);
    }
}
