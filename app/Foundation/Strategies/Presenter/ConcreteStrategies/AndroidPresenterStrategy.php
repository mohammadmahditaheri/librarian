<?php

namespace App\Foundation\Strategies\Presenter\ConcreteStrategies;

use App\Foundation\Composables\Responses\SendsResponseForAndroid;
use App\Foundation\Strategies\Presenter\PresenterStrategyInterface;
use Illuminate\Http\Response;

class AndroidPresenterStrategy implements PresenterStrategyInterface
{
    use SendsResponseForAndroid;

    public function presentData(mixed $data): Response
    {
        return $this->sendData($data);
    }
}
